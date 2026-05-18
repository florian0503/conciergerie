<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;

#[IsGranted('ROLE_ADMIN')]
class PhotoUploadController extends AbstractController
{
    public function __construct(private SluggerInterface $slugger) {}

    #[Route('/admin/upload-photo', name: 'admin_upload_photo', methods: ['POST'])]
    public function upload(Request $request): JsonResponse
    {
        $file = $request->files->get('file');

        if (!$file) {
            return $this->json(['error' => 'Aucun fichier reçu'], 400);
        }

        $ext = strtolower($file->getClientOriginalExtension());
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
            return $this->json(['error' => 'Format non supporté (jpg, png, webp, gif uniquement)'], 400);
        }

        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeName = $this->slugger->slug($originalName)->lower();
        $newFilename = $safeName . '-' . uniqid() . '.' . $ext;

        $uploadDir = $this->getParameter('kernel.project_dir') . '/public/images/logements';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $file->move($uploadDir, $newFilename);

        return $this->json(['path' => '/images/logements/' . $newFilename]);
    }
}
