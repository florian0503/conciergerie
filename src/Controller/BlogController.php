<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class BlogController extends AbstractController
{
    private function getArticles(): array
    {
        return [
            'comment-augmenter-revenus-airbnb' => [
                'slug'     => 'comment-augmenter-revenus-airbnb',
                'tag'      => 'À la une',
                'title'    => 'Comment augmenter ses revenus Airbnb de +34 % à Lyon en 3 mois',
                'excerpt'  => 'Tarification dynamique, optimisation des annonces, gestion des délais de réponse : les leviers concrets que nous actionnons pour chacun de nos propriétaires, avec les chiffres à l\'appui.',
                'author'   => 'Sierra Mathis',
                'date'     => '12 avril 2026',
                'read'     => '8 min de lecture',
                'img'      => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=1200&q=80',
                'content'  => [
                    ['type' => 'lead', 'text' => 'Quand un propriétaire nous confie son bien, la première question est toujours la même : "Combien vais-je gagner de plus ?" La réponse honnête : ça dépend. Mais en moyenne, nos propriétaires observent une hausse de 34 % de leurs revenus dans les trois premiers mois. Voici comment.'],
                    ['type' => 'h2', 'text' => '1. La tarification dynamique, levier n°1'],
                    ['type' => 'p', 'text' => 'La plupart des propriétaires fixent un prix et l\'oublient. C\'est la première erreur. À Lyon, les événements — Sirha, Nuits de Fourvière, Biennale, matchs de foot — font exploser la demande certains week-ends. Un appartement à 90 € la nuit peut se louer 180 € pendant la Fête des Lumières.'],
                    ['type' => 'p', 'text' => 'Nous ajustons les prix quotidiennement en fonction de la demande locale, de la concurrence directe et du taux d\'occupation des 30 prochains jours. Ce seul levier représente en moyenne 15 à 20 points de gain.'],
                    ['type' => 'h2', 'text' => '2. Des annonces qui convertissent'],
                    ['type' => 'p', 'text' => 'Le titre, les photos, l\'ordre des images, la description : tout est optimisé pour le référencement Airbnb et la conversion. Un appartement identique avec un shooting professionnel et une annonce bien rédigée génère 40 % de clics en plus qu\'une annonce standard.'],
                    ['type' => 'p', 'text' => 'Nous rédigeons en français et en anglais, avec des mots-clés adaptés à chaque plateforme. Résultat : meilleure visibilité, plus de demandes, plus de réservations.'],
                    ['type' => 'h2', 'text' => '3. La réactivité comme avantage concurrentiel'],
                    ['type' => 'p', 'text' => 'Airbnb et Booking pénalisent les hôtes lents à répondre. Notre temps de réponse moyen est de 15 minutes, 7j/7. Cela améliore le classement de l\'annonce et rassure les voyageurs hésitants.'],
                    ['type' => 'p', 'text' => 'Une demande sans réponse rapide, c\'est une réservation perdue. Nous ne laissons rien passer.'],
                    ['type' => 'h2', 'text' => 'En résumé'],
                    ['type' => 'p', 'text' => 'Les 34 % de gains moyens ne viennent pas d\'un seul levier, mais d\'une combinaison : tarification dynamique, annonces optimisées, réactivité maximale et suivi qualité rigoureux. C\'est ce que nous faisons pour chacun de nos 120 biens — chaque jour.'],
                ],
            ],
            'micro-bic-ou-regime-reel' => [
                'slug'     => 'micro-bic-ou-regime-reel',
                'tag'      => 'Fiscalité',
                'title'    => 'Micro-BIC ou régime réel : quel régime fiscal choisir pour votre location meublée ?',
                'excerpt'  => 'Seuils, abattements, charges déductibles — un comparatif clair pour optimiser votre imposition sans vous noyer dans le jargon comptable.',
                'author'   => 'Sierra Mathis',
                'date'     => '8 avril 2026',
                'read'     => '6 min de lecture',
                'img'      => 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?w=1200&q=80',
                'content'  => [
                    ['type' => 'lead', 'text' => 'Vous louez votre appartement en courte durée et vous vous demandez comment déclarer vos revenus ? Deux régimes s\'offrent à vous. Le bon choix peut vous faire économiser plusieurs milliers d\'euros par an.'],
                    ['type' => 'h2', 'text' => 'Le micro-BIC : simple mais limité'],
                    ['type' => 'p', 'text' => 'Le micro-BIC s\'applique automatiquement si vos revenus annuels ne dépassent pas 77 700 €. Il vous accorde un abattement forfaitaire de 50 % sur vos revenus : vous n\'êtes imposé que sur la moitié de ce que vous encaissez.'],
                    ['type' => 'p', 'text' => 'Avantage : aucune comptabilité, aucun justificatif à conserver. Inconvénient : si vos charges réelles dépassent 50 % de vos revenus (travaux, amortissement du bien, intérêts d\'emprunt), vous y perdez.'],
                    ['type' => 'h2', 'text' => 'Le régime réel : plus complexe, souvent plus rentable'],
                    ['type' => 'p', 'text' => 'Au régime réel, vous déduisez toutes vos charges réelles : intérêts d\'emprunt, charges de copropriété, assurances, frais de gestion, amortissement du bien et du mobilier. Pour un investissement locatif avec emprunt, ce régime est presque toujours plus avantageux.'],
                    ['type' => 'p', 'text' => 'Il nécessite un expert-comptable (comptez 500 à 1 500 € par an selon la complexité) — mais le gain fiscal dépasse largement ce coût dans la majorité des cas.'],
                    ['type' => 'h2', 'text' => 'Notre recommandation'],
                    ['type' => 'p', 'text' => 'Nous ne sommes pas comptables, et nous vous conseillons toujours de consulter un spécialiste en location meublée. Mais notre expérience sur 120 biens nous a appris que le régime réel est généralement gagnant dès que le bien est financé par emprunt ou que les travaux sont significatifs.'],
                ],
            ],
            'tarification-dynamique' => [
                'slug'     => 'tarification-dynamique',
                'tag'      => 'Stratégie',
                'title'    => 'Tarification dynamique : pourquoi fixer un prix fixe vous coûte cher',
                'excerpt'  => 'Les événements lyonnais, la saisonnalité, la concurrence locale : autant de variables qui font varier la demande — et que votre prix doit refléter.',
                'author'   => 'Marc Duval',
                'date'     => '1 avril 2026',
                'read'     => '5 min de lecture',
                'img'      => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1200&q=80',
                'content'  => [
                    ['type' => 'lead', 'text' => 'Un prix fixe, c\'est pratique. Mais c\'est aussi la façon la plus sûre de laisser de l\'argent sur la table — ou de rester vide quand la demande chute.'],
                    ['type' => 'h2', 'text' => 'La demande fluctue, votre prix aussi devrait'],
                    ['type' => 'p', 'text' => 'À Lyon, la demande varie considérablement selon la saison, les événements professionnels (foires, congrès), culturels (Fête des Lumières, Nuits de Fourvière) et même les jours de la semaine. Un jeudi en janvier n\'a rien à voir avec un samedi en décembre.'],
                    ['type' => 'h2', 'text' => 'Comment nous gérons les prix'],
                    ['type' => 'p', 'text' => 'Nous analysons quotidiennement les données du marché : taux d\'occupation des concurrents directs, événements à venir dans les 90 jours, niveau de la demande en temps réel. Nous ajustons vos prix en conséquence, parfois plusieurs fois par semaine.'],
                    ['type' => 'p', 'text' => 'Le résultat : un taux d\'occupation optimisé sans sacrifier le prix moyen par nuit. Les deux indicateurs progressent ensemble.'],
                    ['type' => 'h2', 'text' => 'Les événements à surveiller à Lyon'],
                    ['type' => 'p', 'text' => 'Sirha (janvier), Salon de l\'agriculture urbaine, matchs de l\'OL, Fête des Lumières (décembre), Nuits de Fourvière (juin-août), Biennale de Lyon... autant d\'occasions de multiplier votre prix par 1,5 à 2,5 sur quelques nuits. Ne les ratez pas.'],
                ],
            ],
            'reglementation-location-courte-duree-lyon-2026' => [
                'slug'     => 'reglementation-location-courte-duree-lyon-2026',
                'tag'      => 'Réglementation',
                'title'    => 'Location courte durée à Lyon : ce que dit la loi en 2026',
                'excerpt'  => 'Numéro d\'enregistrement, plafond de 120 nuits, règlement de copropriété : le point complet sur les obligations légales des propriétaires lyonnais.',
                'author'   => 'Sierra Mathis',
                'date'     => '22 mars 2026',
                'read'     => '7 min de lecture',
                'img'      => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=1200&q=80',
                'content'  => [
                    ['type' => 'lead', 'text' => 'La réglementation autour de la location courte durée s\'est durcie ces dernières années, et Lyon ne fait pas exception. Voici ce que vous devez savoir pour louer en toute légalité en 2026.'],
                    ['type' => 'h2', 'text' => 'Le numéro d\'enregistrement en mairie'],
                    ['type' => 'p', 'text' => 'Depuis 2019, toute location courte durée à Lyon doit faire l\'objet d\'une déclaration en mairie. Vous obtenez un numéro d\'enregistrement à 13 chiffres, obligatoire sur toutes vos annonces Airbnb et Booking. L\'absence de ce numéro expose à une amende de 5 000 €.'],
                    ['type' => 'h2', 'text' => 'Le plafond de 120 nuits pour la résidence principale'],
                    ['type' => 'p', 'text' => 'Si vous louez votre résidence principale, vous êtes limité à 120 nuits par an. Au-delà, le logement est considéré comme un meublé de tourisme et des obligations supplémentaires s\'appliquent, notamment un changement d\'usage.'],
                    ['type' => 'p', 'text' => 'Pour une résidence secondaire, cette limite ne s\'applique pas — mais d\'autres règles entrent en jeu selon les zones.'],
                    ['type' => 'h2', 'text' => 'Le règlement de copropriété'],
                    ['type' => 'p', 'text' => 'Avant de vous lancer, vérifiez votre règlement de copropriété. Certains immeubles interdisent explicitement la location commerciale. En cas de doute, consultez le syndic ou un avocat spécialisé.'],
                    ['type' => 'h2', 'text' => 'Notre accompagnement'],
                    ['type' => 'p', 'text' => 'Lors de notre première visite, nous passons en revue toutes vos obligations légales et nous assurons que votre bien est en conformité avant la mise en ligne. Pas de mauvaise surprise.'],
                ],
            ],
            '5-ajustements-deco' => [
                'slug'     => '5-ajustements-deco',
                'tag'      => 'Mise en scène',
                'title'    => '5 ajustements déco qui font passer votre note de 4.6 à 4.9',
                'excerpt'  => 'Lumière, literie, équipements cuisine : les retours les plus fréquents dans les avis voyageurs, et comment les corriger rapidement et sans budget.',
                'author'   => 'Léa Bernard',
                'date'     => '14 mars 2026',
                'read'     => '4 min de lecture',
                'img'      => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=1200&q=80',
                'content'  => [
                    ['type' => 'lead', 'text' => 'La différence entre un 4.6 et un 4.9 se joue souvent sur des détails. Après des centaines d\'inspections et d\'avis analysés, voici les 5 points qui reviennent le plus souvent.'],
                    ['type' => 'h2', 'text' => '1. La literie'],
                    ['type' => 'p', 'text' => 'C\'est le point n°1 des avis négatifs. Un matelas inconfortable ou des oreillers bas de gamme suffisent à plomber une note. Investissez dans une literie qualité hôtel — les voyageurs le mentionnent toujours quand c\'est bien, et encore plus quand c\'est mauvais.'],
                    ['type' => 'h2', 'text' => '2. L\'éclairage'],
                    ['type' => 'p', 'text' => 'Une lumière froide et unique au plafond donne une ambiance cave. Ajoutez des lampes d\'appoint, optez pour des ampoules à 2700K (blanc chaud). Le résultat est immédiat en photo et en ressenti.'],
                    ['type' => 'h2', 'text' => '3. La cuisine équipée'],
                    ['type' => 'p', 'text' => 'Cafetière de qualité, couteaux bien aiguisés, planche à découper, assez d\'assiettes pour le nombre maximum de voyageurs. Les manques en cuisine sont systématiquement signalés dans les avis.'],
                    ['type' => 'h2', 'text' => '4. Le wifi et la connexion'],
                    ['type' => 'p', 'text' => 'Un wifi lent ou instable, c\'est une étoile en moins garantie. Testez votre débit régulièrement et affichez le mot de passe de façon visible, avec le débit annoncé dans l\'annonce.'],
                    ['type' => 'h2', 'text' => '5. Les petites attentions'],
                    ['type' => 'p', 'text' => 'Café, thé, quelques capsules, un guide des bonnes adresses du quartier manuscrit — ce ne sont pas des gadgets. Ce sont des signaux qui disent au voyageur qu\'il était attendu. Et ça, ça se retrouve dans les avis.'],
                ],
            ],
            'gerer-airbnb-a-distance' => [
                'slug'     => 'gerer-airbnb-a-distance',
                'tag'      => 'Gestion',
                'title'    => 'Gérer un Airbnb à distance : ce que les propriétaires sous-estiment toujours',
                'excerpt'  => 'Expatriés, investisseurs parisiens, propriétaires en déplacement : les pièges que nous voyons revenir, et pourquoi une conciergerie locale change tout.',
                'author'   => 'Thomas Renard',
                'date'     => '5 mars 2026',
                'read'     => '6 min de lecture',
                'img'      => 'https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?w=1200&q=80',
                'content'  => [
                    ['type' => 'lead', 'text' => 'Beaucoup de propriétaires pensent qu\'avec les bons outils numériques, gérer un Airbnb à distance est simple. C\'est vrai... jusqu\'au premier imprévu.'],
                    ['type' => 'h2', 'text' => 'Les outils ne remplacent pas une présence locale'],
                    ['type' => 'p', 'text' => 'Les serrures connectées, les messageries automatiques, les price managers : ces outils sont utiles. Mais quand le lave-linge tombe en panne à 18h un vendredi, quand un voyageur perd ses clés à 23h, quand le chauffage ne fonctionne plus — aucun outil ne remplace quelqu\'un sur place.'],
                    ['type' => 'h2', 'text' => 'Ce que nous voyons revenir'],
                    ['type' => 'p', 'text' => 'Les propriétaires qui gèrent à distance sous-estiment systématiquement le temps que prend la coordination des prestataires (plombier, électricien, ménage), la gestion des cas limites avec les voyageurs, et le suivi de l\'état du bien entre deux séjours.'],
                    ['type' => 'h2', 'text' => 'Ce que change une conciergerie locale'],
                    ['type' => 'p', 'text' => 'Avec Maison Mathis, vous avez une équipe à Lyon qui connaît votre bien, votre quartier, et votre réseau d\'artisans. Un problème à 23h ? Nous gérons. Un voyageur mécontent ? Nous gérons. Une rotation de dernière minute ? Nous gérons. Vous, vous dormez.'],
                ],
            ],
            'meilleur-quartier-lyon-airbnb-2026' => [
                'slug'     => 'meilleur-quartier-lyon-airbnb-2026',
                'tag'      => 'Marché',
                'title'    => 'Quel quartier de Lyon offre le meilleur rendement Airbnb en 2026 ?',
                'excerpt'  => 'Presqu\'île, Vieux Lyon, Croix-Rousse, Confluence : analyse des taux d\'occupation, prix moyens et saisonnalité par quartier.',
                'author'   => 'Marc Duval',
                'date'     => '20 février 2026',
                'read'     => '9 min de lecture',
                'img'      => 'https://images.unsplash.com/photo-1484154218962-a197022b5858?w=1200&q=80',
                'content'  => [
                    ['type' => 'lead', 'text' => 'Tous les quartiers de Lyon ne se valent pas sur Airbnb. Taux d\'occupation, prix moyen par nuit, saisonnalité, profil des voyageurs : voici notre analyse basée sur notre portefeuille de 120 biens.'],
                    ['type' => 'h2', 'text' => 'Presqu\'île — le plus demandé'],
                    ['type' => 'p', 'text' => 'Taux d\'occupation moyen : 82 %. Prix moyen par nuit : 95 €. La Presqu\'île concentre l\'essentiel de la demande touristique et professionnelle. Les biens bien situés se louent quasi-continuellement, avec des pics marqués lors des événements au Palais des Congrès et à l\'Amphithéâtre.'],
                    ['type' => 'h2', 'text' => 'Vieux Lyon — le charme qui se paie'],
                    ['type' => 'p', 'text' => 'Taux d\'occupation moyen : 78 %. Prix moyen par nuit : 110 €. Le Vieux Lyon attire une clientèle internationale prête à payer plus pour le cachet des traboules et des façades Renaissance. Saisonnalité marquée : très fort d\'avril à octobre, plus calme l\'hiver.'],
                    ['type' => 'h2', 'text' => 'Croix-Rousse — la montée en puissance'],
                    ['type' => 'p', 'text' => 'Taux d\'occupation moyen : 74 %. Prix moyen par nuit : 82 €. Le plateau séduit une clientèle plus jeune, branchée, et de plus en plus internationale. Les appartements avec terrasse ou vue sur les toits atteignent des prix comparables au Vieux Lyon.'],
                    ['type' => 'h2', 'text' => 'Confluence — le quartier à surveiller'],
                    ['type' => 'p', 'text' => 'Taux d\'occupation moyen : 69 %. Prix moyen par nuit : 88 €. Confluence reste en deçà des autres quartiers en notoriété touristique, mais attire une clientèle d\'affaires liée aux sièges sociaux implantés dans le quartier. Potentiel de croissance fort.'],
                    ['type' => 'h2', 'text' => 'Notre verdict'],
                    ['type' => 'p', 'text' => 'Le meilleur rendement absolu reste la Presqu\'île, mais le meilleur rapport prix d\'achat / rendement locatif se trouve souvent à Croix-Rousse ou Confluence. Tout dépend de votre projet d\'investissement.'],
                ],
            ],
        ];
    }

    #[Route('/blog', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'articles' => $this->getArticles(),
        ]);
    }

    #[Route('/blog/{slug}', name: 'app_blog_article')]
    public function article(string $slug): Response
    {
        $articles = $this->getArticles();

        if (!isset($articles[$slug])) {
            throw new NotFoundHttpException('Article introuvable.');
        }

        $article = $articles[$slug];
        $allArticles = array_values($articles);
        $related = array_filter($allArticles, fn($a) => $a['slug'] !== $slug);
        $related = array_slice(array_values($related), 0, 3);

        return $this->render('blog/article.html.twig', [
            'article' => $article,
            'related' => $related,
        ]);
    }
}
