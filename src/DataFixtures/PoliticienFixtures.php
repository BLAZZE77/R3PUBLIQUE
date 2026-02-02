<?php

namespace App\DataFixtures;

use App\Entity\Politicien;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PoliticienFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $politiciens = [
            ['nom' => 'Charles de Gaulle', 'parti' => 'UNR', 'fonction' => 'Président', 'bord' => 'droite', 'anneeDebut' => 1959, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Georges Pompidou', 'parti' => 'UDR', 'fonction' => 'Président', 'bord' => 'droite', 'anneeDebut' => 1969, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Valéry Giscard d\'Estaing', 'parti' => 'UDF', 'fonction' => 'Président', 'bord' => 'droite', 'anneeDebut' => 1974, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'François Mitterrand', 'parti' => 'PS', 'fonction' => 'Président', 'bord' => 'gauche', 'anneeDebut' => 1981, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Jacques Chirac', 'parti' => 'RPR', 'fonction' => 'Président', 'bord' => 'droite', 'anneeDebut' => 1995, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Nicolas Sarkozy', 'parti' => 'UMP', 'fonction' => 'Président', 'bord' => 'droite', 'anneeDebut' => 2007, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'François Hollande', 'parti' => 'PS', 'fonction' => 'Président', 'bord' => 'gauche', 'anneeDebut' => 2012, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Emmanuel Macron', 'parti' => 'LREM', 'fonction' => 'Président', 'bord' => 'centre', 'anneeDebut' => 2017, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Michel Debré', 'parti' => 'UNR', 'fonction' => 'Premier ministre', 'bord' => 'droite', 'anneeDebut' => 1959, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Jacques Chaban-Delmas', 'parti' => 'UDR', 'fonction' => 'Premier ministre', 'bord' => 'droite', 'anneeDebut' => 1969, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Pierre Messmer', 'parti' => 'UDR', 'fonction' => 'Premier ministre', 'bord' => 'droite', 'anneeDebut' => 1972, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Raymond Barre', 'parti' => 'UDF', 'fonction' => 'Premier ministre', 'bord' => 'droite', 'anneeDebut' => 1976, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Pierre Mauroy', 'parti' => 'PS', 'fonction' => 'Premier ministre', 'bord' => 'gauche', 'anneeDebut' => 1981, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Laurent Fabius', 'parti' => 'PS', 'fonction' => 'Premier ministre', 'bord' => 'gauche', 'anneeDebut' => 1984, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Michel Rocard', 'parti' => 'PS', 'fonction' => 'Premier ministre', 'bord' => 'gauche', 'anneeDebut' => 1988, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Édith Cresson', 'parti' => 'PS', 'fonction' => 'Premier ministre', 'bord' => 'gauche', 'anneeDebut' => 1991, 'genre' => 'F', 'republique' => '5e'],
            ['nom' => 'Édouard Balladur', 'parti' => 'RPR', 'fonction' => 'Premier ministre', 'bord' => 'droite', 'anneeDebut' => 1993, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Alain Juppé', 'parti' => 'RPR', 'fonction' => 'Premier ministre', 'bord' => 'droite', 'anneeDebut' => 1995, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Lionel Jospin', 'parti' => 'PS', 'fonction' => 'Premier ministre', 'bord' => 'gauche', 'anneeDebut' => 1997, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Jean-Pierre Raffarin', 'parti' => 'UMP', 'fonction' => 'Premier ministre', 'bord' => 'droite', 'anneeDebut' => 2002, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Dominique de Villepin', 'parti' => 'UMP', 'fonction' => 'Premier ministre', 'bord' => 'droite', 'anneeDebut' => 2005, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'François Fillon', 'parti' => 'UMP', 'fonction' => 'Premier ministre', 'bord' => 'droite', 'anneeDebut' => 2007, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Jean-Marc Ayrault', 'parti' => 'PS', 'fonction' => 'Premier ministre', 'bord' => 'gauche', 'anneeDebut' => 2012, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Manuel Valls', 'parti' => 'PS', 'fonction' => 'Premier ministre', 'bord' => 'gauche', 'anneeDebut' => 2014, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Édouard Philippe', 'parti' => 'LREM', 'fonction' => 'Premier ministre', 'bord' => 'droite', 'anneeDebut' => 2017, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Jean Castex', 'parti' => 'LREM', 'fonction' => 'Premier ministre', 'bord' => 'droite', 'anneeDebut' => 2020, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Élisabeth Borne', 'parti' => 'LREM', 'fonction' => 'Premier ministre', 'bord' => 'centre', 'anneeDebut' => 2022, 'genre' => 'F', 'republique' => '5e'],
            ['nom' => 'Gabriel Attal', 'parti' => 'Renaissance', 'fonction' => 'Premier ministre', 'bord' => 'centre', 'anneeDebut' => 2024, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Jean-Marie Le Pen', 'parti' => 'FN', 'fonction' => 'Député', 'bord' => 'droite', 'anneeDebut' => 1956, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Marine Le Pen', 'parti' => 'RN', 'fonction' => 'Députée', 'bord' => 'droite', 'anneeDebut' => 2011, 'genre' => 'F', 'republique' => '5e'],
            ['nom' => 'Jean-Luc Mélenchon', 'parti' => 'LFI', 'fonction' => 'Député', 'bord' => 'gauche', 'anneeDebut' => 2012, 'genre' => 'H', 'republique' => '5e'],
            ['nom' => 'Simone Veil', 'parti' => 'UDF', 'fonction' => 'Ministre', 'bord' => 'droite', 'anneeDebut' => 1974, 'genre' => 'F', 'republique' => '5e'],
        ];

        foreach ($politiciens as $data) {
            $politicien = new Politicien();
            $politicien->setNom($data['nom']);
            $politicien->setParti($data['parti']);
            $politicien->setFonction($data['fonction']);
            $politicien->setBord($data['bord']);
            $politicien->setAnneeDebut($data['anneeDebut']);
            $politicien->setGenre($data['genre']);
            $politicien->setRepublique($data['republique']);
            $manager->persist($politicien);
        }

        $manager->flush();
    }
}
