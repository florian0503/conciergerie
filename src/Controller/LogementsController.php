<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class LogementsController extends AbstractController
{
    private function getLogements(): array
    {
        return [
            'le-presquile' => [
                'slug'       => 'le-presquile',
                'nom'        => 'Le Presqu\'île',
                'type'       => 'Appartement',
                'quartier'   => 'Presqu\'île',
                'voyageurs'  => 6,
                'chambres'   => 3,
                'prix'       => 189,
                'note'       => 4.97,
                'avis'       => 142,
                'img_index'  => 1,
                'description' => 'Un appartement haussmannien lumineux au cœur de la Presqu\'île, à deux pas de la place Bellecour. Parquet massif, hauteur sous plafond de 3,20 m, cuisine équipée ouverte sur le salon. Idéal pour les familles ou groupes d\'amis souhaitant explorer Lyon à pied.',
                'equipements' => ['Wi-Fi haut débit', 'Cuisine équipée', 'Lave-linge', 'Climatisation', 'Parking à proximité', 'Terrasse', 'Baby-foot', 'Cafetière Nespresso'],
                'points_interet' => ['Place Bellecour — 3 min à pied', 'Vieux Lyon — 10 min à pied', 'Gare Part-Dieu — 20 min à pied', 'Marché Saint-Antoine — 5 min'],
            ],
            'haut-pave' => [
                'slug'       => 'haut-pave',
                'nom'        => 'Haut-Pavé',
                'type'       => 'Duplex',
                'quartier'   => 'Vieux Lyon',
                'voyageurs'  => 4,
                'chambres'   => 3,
                'prix'       => 149,
                'note'       => 4.93,
                'avis'       => 89,
                'img_index'  => 2,
                'description' => 'Un duplex de caractère niché dans une traboule du Vieux Lyon, classé au patrimoine mondial de l\'UNESCO. Pierres apparentes, poutres anciennes et vue sur les toits lyonnais. Un cadre exceptionnel pour une immersion dans l\'histoire de la soierie.',
                'equipements' => ['Wi-Fi haut débit', 'Cuisine équipée', 'Lave-linge', 'Vue panoramique', 'Cafetière Nespresso', 'Linge de maison inclus', 'Accueil personnalisé'],
                'points_interet' => ['Traboules — sur place', 'Basilique Fourvière — 15 min à pied', 'Musée Gadagne — 5 min', 'Quais de Saône — 3 min'],
            ],
            'atelier-croix-rousse' => [
                'slug'       => 'atelier-croix-rousse',
                'nom'        => 'Atelier Croix-Rousse',
                'type'       => 'Loft',
                'quartier'   => 'Croix-Rousse',
                'voyageurs'  => 2,
                'chambres'   => 1,
                'prix'       => 169,
                'note'       => 4.98,
                'avis'       => 213,
                'img_index'  => 3,
                'description' => 'Un loft d\'artiste dans un ancien atelier de canuts, avec verrière industrielle et mezzanine. Esprit bohème et matériaux nobles se mêlent dans cet appartement unique en son genre. Le quartier le plus vivant de Lyon est à votre porte.',
                'equipements' => ['Wi-Fi haut débit', 'Cuisine ouverte', 'Lave-linge', 'Vélos disponibles', 'Terrasse sur toit', 'Cafetière Nespresso', 'Vinyle & platine'],
                'points_interet' => ['Marché de la Croix-Rousse — 5 min', 'Boulevard de la Croix-Rousse — 2 min', 'Pentes — 10 min à pied', 'Parc de la Tête d\'Or — 25 min'],
            ],
            'soierie-confluence' => [
                'slug'       => 'soierie-confluence',
                'nom'        => 'Soierie Confluence',
                'type'       => 'Maison',
                'quartier'   => 'Confluence',
                'voyageurs'  => 8,
                'chambres'   => 3,
                'prix'       => 329,
                'note'       => 4.89,
                'avis'       => 67,
                'img_index'  => 4,
                'description' => 'Une maison de ville contemporaine dans le quartier tendance de la Confluence. Architecture audacieuse, grandes baies vitrées et jardin privatif. À deux pas du Musée des Confluences et des meilleurs restaurants de Lyon.',
                'equipements' => ['Wi-Fi haut débit', 'Cuisine professionnelle', 'Lave-linge & sèche-linge', 'Jardin privatif', 'Barbecue', 'Parking privé', 'Climatisation', 'Piscine chauffée'],
                'points_interet' => ['Musée des Confluences — 8 min à pied', 'Centre commercial Confluence — 5 min', 'Quais de Saône — 10 min', 'Tram T1 — 3 min'],
            ],
            'rive-de-saone' => [
                'slug'       => 'rive-de-saone',
                'nom'        => 'Rive de Saône',
                'type'       => 'Appartement',
                'quartier'   => 'Vieux Lyon',
                'voyageurs'  => 8,
                'chambres'   => 3,
                'prix'       => 199,
                'note'       => 4.85,
                'avis'       => 104,
                'img_index'  => 5,
                'description' => 'Un grand appartement avec vue directe sur la Saône et les quais de Saint-Vincent. Séjour spacieux, trois chambres indépendantes et une terrasse face à l\'eau. Le spectacle des bateaux et des quichets colorés change à chaque heure.',
                'equipements' => ['Wi-Fi haut débit', 'Cuisine équipée', 'Lave-linge', 'Terrasse avec vue', 'Climatisation', 'Cafetière Nespresso', 'Linge de maison inclus'],
                'points_interet' => ['Quais de Saône — vue directe', 'Vieux Lyon — 5 min', 'Marché quai Saint-Antoine — 8 min', 'Métro D Bellecour — 12 min'],
            ],
            'terreaux-haussmann' => [
                'slug'       => 'terreaux-haussmann',
                'nom'        => 'Terreaux Haussmann',
                'type'       => 'Appartement',
                'quartier'   => 'Terreaux',
                'voyageurs'  => 5,
                'chambres'   => 2,
                'prix'       => 175,
                'note'       => 4.93,
                'avis'       => 156,
                'img_index'  => 6,
                'description' => 'Un appartement bourgeois au cœur du quartier des Terreaux, entre la place de la République et le Musée des Beaux-Arts. Moulures, cheminée d\'époque et parquet Versailles pour une ambiance authentiquement lyonnaise.',
                'equipements' => ['Wi-Fi haut débit', 'Cuisine équipée', 'Lave-linge', 'Cheminée décorative', 'Climatisation', 'Cafetière Nespresso', 'Piano droit'],
                'points_interet' => ['Place des Terreaux — 2 min', 'Musée des Beaux-Arts — 3 min', 'Opéra de Lyon — 5 min', 'Métro A Hôtel de Ville — 4 min'],
            ],
            'villa-monts-dor' => [
                'slug'       => 'villa-monts-dor',
                'nom'        => 'Villa des Monts d\'Or',
                'type'       => 'Villa',
                'quartier'   => 'Monts d\'Or',
                'voyageurs'  => 10,
                'chambres'   => 4,
                'prix'       => 489,
                'note'       => 4.96,
                'avis'       => 48,
                'img_index'  => 7,
                'description' => 'Une villa d\'exception dans les Monts d\'Or avec piscine à débordement et vue sur la vallée de la Saône. Cinq hectares de parc arboré, salle de cinéma, cave à vin et court de pétanque. Le cadre idéal pour un séminaire d\'entreprise ou une occasion spéciale.',
                'equipements' => ['Wi-Fi fibre', 'Cuisine professionnelle', 'Piscine à débordement', 'Salle de cinéma', 'Cave à vin', 'Court de pétanque', 'Parking 6 voitures', 'Concierge sur place'],
                'points_interet' => ['Neuville-sur-Saône — 10 min', 'Centre de Lyon — 30 min en voiture', 'Randonnées Monts d\'Or — départ direct', 'Gare TGV — 35 min'],
            ],
            'studio-part-dieu' => [
                'slug'       => 'studio-part-dieu',
                'nom'        => 'Studio Part-Dieu',
                'type'       => 'Studio',
                'quartier'   => 'Part-Dieu',
                'voyageurs'  => 2,
                'chambres'   => 1,
                'prix'       => 89,
                'note'       => 4.91,
                'avis'       => 201,
                'img_index'  => 8,
                'description' => 'Un studio design et fonctionnel idéalement situé à 300 m de la gare Part-Dieu. Parfait pour les voyageurs d\'affaires ou les week-ends en couple. Tout le confort nécessaire dans un espace optimisé avec goût.',
                'equipements' => ['Wi-Fi haut débit', 'Cuisine équipée', 'Smart TV', 'Cafetière Nespresso', 'Linge de maison inclus', 'Check-in autonome 24h/24'],
                'points_interet' => ['Gare Part-Dieu — 3 min à pied', 'Centre commercial Part-Dieu — 5 min', 'Métro B Part-Dieu — 2 min', 'Bellecour — 15 min en métro'],
            ],
        ];
    }

    #[Route('/logements', name: 'app_logements')]
    public function index(): Response
    {
        return $this->render('logements/index.html.twig', [
            'logements' => $this->getLogements(),
        ]);
    }

    #[Route('/logements/{slug}', name: 'app_logement_show')]
    public function show(string $slug): Response
    {
        $logements = $this->getLogements();

        if (!isset($logements[$slug])) {
            throw new NotFoundHttpException('Logement introuvable.');
        }

        $logement = $logements[$slug];
        $autres = array_filter($logements, fn($l) => $l['slug'] !== $slug);
        $autres = array_slice($autres, 0, 3);

        return $this->render('logements/show.html.twig', [
            'logement' => $logement,
            'autres'   => $autres,
        ]);
    }
}
