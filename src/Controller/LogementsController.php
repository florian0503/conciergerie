<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

final class LogementsController extends AbstractController
{
    private function getLogements(): array
    {
        return [
            'le-presquile' => [
                'slug'          => 'le-presquile',
                'nom'           => 'Le Presqu\'île',
                'type'          => 'Appartement',
                'quartier'      => 'Presqu\'île',
                'voyageurs'     => 6,
                'chambres'      => 3,
                'note'          => 4.97,
                'avis'          => 142,
                'occupation'    => 91,
                'revenus'       => '3 800',
                'img_index'     => 1,
                'photos'        => [
                    'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=1400&q=80',
                    'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800&q=80',
                    'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800&q=80',
                    'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?w=800&q=80',
                    'https://images.unsplash.com/photo-1484154218962-a197022b5858?w=800&q=80',
                ],
                'description'   => 'Un appartement haussmannien lumineux au cœur de la Presqu\'île, à deux pas de la place Bellecour. Parquet massif, hauteur sous plafond de 3,20 m, cuisine équipée ouverte sur le salon.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine équipée', 'Lave-linge', 'Climatisation', 'Parking à proximité', 'Terrasse', 'Baby-foot', 'Cafetière Nespresso'],
                'points_interet' => ['Place Bellecour — 3 min à pied', 'Vieux Lyon — 10 min à pied', 'Gare Part-Dieu — 20 min à pied', 'Marché Saint-Antoine — 5 min'],
            ],
            'haut-pave' => [
                'slug'          => 'haut-pave',
                'nom'           => 'Haut-Pavé',
                'type'          => 'Duplex',
                'quartier'      => 'Vieux Lyon',
                'voyageurs'     => 4,
                'chambres'      => 3,
                'note'          => 4.93,
                'avis'          => 89,
                'occupation'    => 88,
                'revenus'       => '2 900',
                'img_index'     => 2,
                'photos'        => [
                    'https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=1400&q=80',
                    'https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?w=800&q=80',
                    'https://images.unsplash.com/photo-1540518614846-7eded433c457?w=800&q=80',
                    'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=800&q=80',
                    'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=800&q=80',
                ],
                'description'   => 'Un duplex de caractère niché dans une traboule du Vieux Lyon, classé au patrimoine mondial de l\'UNESCO. Pierres apparentes, poutres anciennes et vue sur les toits lyonnais.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine équipée', 'Lave-linge', 'Vue panoramique', 'Cafetière Nespresso', 'Linge de maison inclus', 'Accueil personnalisé'],
                'points_interet' => ['Traboules — sur place', 'Basilique Fourvière — 15 min à pied', 'Musée Gadagne — 5 min', 'Quais de Saône — 3 min'],
            ],
            'atelier-croix-rousse' => [
                'slug'          => 'atelier-croix-rousse',
                'nom'           => 'Atelier Croix-Rousse',
                'type'          => 'Loft',
                'quartier'      => 'Croix-Rousse',
                'voyageurs'     => 2,
                'chambres'      => 1,
                'note'          => 4.98,
                'avis'          => 213,
                'occupation'    => 94,
                'revenus'       => '3 200',
                'img_index'     => 3,
                'photos'        => [
                    'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=1400&q=80',
                    'https://images.unsplash.com/photo-1598928506311-c55ded91a20c?w=800&q=80',
                    'https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=800&q=80',
                    'https://images.unsplash.com/photo-1513694203232-719a280e022f?w=800&q=80',
                    'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800&q=80',
                ],
                'description'   => 'Un loft d\'artiste dans un ancien atelier de canuts, avec verrière industrielle et mezzanine. Esprit bohème et matériaux nobles se mêlent dans cet appartement unique en son genre.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine ouverte', 'Lave-linge', 'Vélos disponibles', 'Terrasse sur toit', 'Cafetière Nespresso', 'Vinyle & platine'],
                'points_interet' => ['Marché de la Croix-Rousse — 5 min', 'Boulevard de la Croix-Rousse — 2 min', 'Pentes — 10 min à pied', 'Parc de la Tête d\'Or — 25 min'],
            ],
            'soierie-confluence' => [
                'slug'          => 'soierie-confluence',
                'nom'           => 'Soierie Confluence',
                'type'          => 'Maison',
                'quartier'      => 'Confluence',
                'voyageurs'     => 8,
                'chambres'      => 3,
                'note'          => 4.89,
                'avis'          => 67,
                'occupation'    => 82,
                'revenus'       => '5 400',
                'img_index'     => 4,
                'photos'        => [
                    'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?w=1400&q=80',
                    'https://images.unsplash.com/photo-1523217582562-09d0def993a6?w=800&q=80',
                    'https://images.unsplash.com/photo-1560185893-a55cbc8c57e8?w=800&q=80',
                    'https://images.unsplash.com/photo-1571939228382-b2f2b585ce15?w=800&q=80',
                    'https://images.unsplash.com/photo-1617806118233-18e1de247200?w=800&q=80',
                ],
                'description'   => 'Une maison de ville contemporaine dans le quartier tendance de la Confluence. Architecture audacieuse, grandes baies vitrées et jardin privatif. À deux pas du Musée des Confluences.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine professionnelle', 'Lave-linge & sèche-linge', 'Jardin privatif', 'Barbecue', 'Parking privé', 'Climatisation', 'Piscine chauffée'],
                'points_interet' => ['Musée des Confluences — 8 min à pied', 'Centre commercial Confluence — 5 min', 'Quais de Saône — 10 min', 'Tram T1 — 3 min'],
            ],
            'rive-de-saone' => [
                'slug'          => 'rive-de-saone',
                'nom'           => 'Rive de Saône',
                'type'          => 'Appartement',
                'quartier'      => 'Vieux Lyon',
                'voyageurs'     => 8,
                'chambres'      => 3,
                'note'          => 4.85,
                'avis'          => 104,
                'occupation'    => 85,
                'revenus'       => '4 100',
                'img_index'     => 5,
                'photos'        => [
                    'https://images.unsplash.com/photo-1493809842364-78817add7ffb?w=1400&q=80',
                    'https://images.unsplash.com/photo-1560185007-cde436f6a4d0?w=800&q=80',
                    'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&q=80',
                    'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?w=800&q=80',
                    'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=800&q=80',
                ],
                'description'   => 'Un grand appartement avec vue directe sur la Saône et les quais de Saint-Vincent. Séjour spacieux, trois chambres indépendantes et une terrasse face à l\'eau.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine équipée', 'Lave-linge', 'Terrasse avec vue', 'Climatisation', 'Cafetière Nespresso', 'Linge de maison inclus'],
                'points_interet' => ['Quais de Saône — vue directe', 'Vieux Lyon — 5 min', 'Marché quai Saint-Antoine — 8 min', 'Métro D Bellecour — 12 min'],
            ],
            'terreaux-haussmann' => [
                'slug'          => 'terreaux-haussmann',
                'nom'           => 'Terreaux Haussmann',
                'type'          => 'Appartement',
                'quartier'      => 'Terreaux',
                'voyageurs'     => 5,
                'chambres'      => 2,
                'note'          => 4.93,
                'avis'          => 156,
                'occupation'    => 89,
                'revenus'       => '3 500',
                'img_index'     => 6,
                'photos'        => [
                    'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=1400&q=80',
                    'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?w=800&q=80',
                    'https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=800&q=80',
                    'https://images.unsplash.com/photo-1565183997392-2f6f122e5912?w=800&q=80',
                    'https://images.unsplash.com/photo-1584622781564-1d987f7333c1?w=800&q=80',
                ],
                'description'   => 'Un appartement bourgeois au cœur du quartier des Terreaux, entre la place de la République et le Musée des Beaux-Arts. Moulures, cheminée d\'époque et parquet Versailles.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine équipée', 'Lave-linge', 'Cheminée décorative', 'Climatisation', 'Cafetière Nespresso', 'Piano droit'],
                'points_interet' => ['Place des Terreaux — 2 min', 'Musée des Beaux-Arts — 3 min', 'Opéra de Lyon — 5 min', 'Métro A Hôtel de Ville — 4 min'],
            ],
            'villa-monts-dor' => [
                'slug'          => 'villa-monts-dor',
                'nom'           => 'Villa des Monts d\'Or',
                'type'          => 'Villa',
                'quartier'      => 'Monts d\'Or',
                'voyageurs'     => 10,
                'chambres'      => 4,
                'note'          => 4.96,
                'avis'          => 48,
                'occupation'    => 78,
                'revenus'       => '8 200',
                'img_index'     => 7,
                'photos'        => [
                    'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=1400&q=80',
                    'https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?w=800&q=80',
                    'https://images.unsplash.com/photo-1613490493576-7fde63acd811?w=800&q=80',
                    'https://images.unsplash.com/photo-1560185893-a55cbc8c57e8?w=800&q=80',
                    'https://images.unsplash.com/photo-1571003123894-1f0594d2b5d9?w=800&q=80',
                ],
                'description'   => 'Une villa d\'exception dans les Monts d\'Or avec piscine à débordement et vue sur la vallée de la Saône. Cinq hectares de parc arboré, salle de cinéma, cave à vin et court de pétanque.',
                'equipements'   => ['Wi-Fi fibre', 'Cuisine professionnelle', 'Piscine à débordement', 'Salle de cinéma', 'Cave à vin', 'Court de pétanque', 'Parking 6 voitures', 'Concierge sur place'],
                'points_interet' => ['Neuville-sur-Saône — 10 min', 'Centre de Lyon — 30 min en voiture', 'Randonnées Monts d\'Or — départ direct', 'Gare TGV — 35 min'],
            ],
            'studio-part-dieu' => [
                'slug'          => 'studio-part-dieu',
                'nom'           => 'Studio Part-Dieu',
                'type'          => 'Studio',
                'quartier'      => 'Part-Dieu',
                'voyageurs'     => 2,
                'chambres'      => 1,
                'note'          => 4.91,
                'avis'          => 201,
                'occupation'    => 93,
                'revenus'       => '1 900',
                'img_index'     => 8,
                'photos'        => [
                    'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=1400&q=80',
                    'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?w=800&q=80',
                    'https://images.unsplash.com/photo-1507089947368-19c1da9775ae?w=800&q=80',
                    'https://images.unsplash.com/photo-1484154218962-a197022b5858?w=800&q=80',
                    'https://images.unsplash.com/photo-1556909172-54557c7e4fb7?w=800&q=80',
                ],
                'description'   => 'Un studio design et fonctionnel idéalement situé à 300 m de la gare Part-Dieu. Parfait pour les voyageurs d\'affaires ou les week-ends en couple. Tout le confort dans un espace optimisé avec goût.',
                'equipements'   => ['Wi-Fi haut débit', 'Cuisine équipée', 'Smart TV', 'Cafetière Nespresso', 'Linge de maison inclus', 'Check-in autonome 24h/24'],
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
        $autres = array_filter($logements, fn ($l) => $l['slug'] !== $slug);
        $autres = array_slice($autres, 0, 3);

        return $this->render('logements/show.html.twig', [
            'logement' => $logement,
            'autres'   => $autres,
        ]);
    }
}
