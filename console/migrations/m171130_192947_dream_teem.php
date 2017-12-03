<?php

class m171130_192947_dream_teem extends \console\models\Migration
{
    /*
    public function up()
    {

    }

    public function down()
    {
        echo "m171130_192947_dream_teem cannot be reverted.\n";

        return false;
    }*/


    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $tableName = \common\models\Member::tableName();
        $userTableName = \common\models\User::tableName();
        $this->createTable($tableName, array(
            'id' => $this->primaryKey(),
            'create_at' => $this->dateTime(),
            'name' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'user_id' => $this->integer()
        ));

        $this->addForeignKey(
            'fk-member-user_id',
            $tableName,
            'user_id',
            $userTableName,
            'id',
            'SET NULL'
        );

        $this->createIndex(
            'i-member-email',
            $tableName,
            'email',
            true
        );



        $data = [
            [
                'Yuri Kozachuk',
                'yuriy.kozachuk@intel.com'
            ],
            [
                'Bulaon, Chris',
                'chris.bulaon@intel.com'
            ],
            [
                'Plasker, Anthony W',
                'anthony.w.plasker@intel.com'
            ],
            [
                'Mehdizadeh, Ali',
                'ali.mehdizadeh@intel.com'
            ],
            [
                'Emmett, Becky',
                'becky.emmett@intel.com'
            ],
            [
                'Hansen, Tim E',
                'tim.e.hansen@intel.com'
            ],
            [
                'Juarez, Arturo', 'arturo.juarez@intel.com'
            ],
            [
                'Lowe, Jeffery',
                'jeffery.lowe@intel.com'
            ],
            [
                'Natividad, April',
                'april.natividad@intel.com'
            ],
            [
                'Phillips, Stefanie J',
                'stefanie.j.phillips@intel.com'
            ],
            [
                'Schlappi, Nicole',
                'nicole.schlappi@intel.com'
            ],
            [
                'Wheeler, Terri',
                'terri.wheeler@intel.com'
            ],
            [
                'Woo, George',
                'george.woo@intel.com'
            ],
            [
                'Ainsworth, Lucas B',
                'lucas.b.ainsworth@intel.com'
            ],
            [
                'Elston, Mark',
                'mark.elston@intel.com'
            ],
            [
                'Shea, Diana L',
                'diana.l.shea@intel.com'
            ],
            [
                'Sidd, David',
                'david.sidd@intel.com'
            ],
            [
                'Raymond, Chris S',
                'chris.s.raymond@intel.com'
            ],
            [
                'Webb, Art D',
                'art.d.webb@intel.com'
            ],
            [
                'Curiel, Braian',
                'braian.curiel@intel.com'
            ],
            [
                'Duvall, Charles A',
                'charles.a.duvall@intel.com'
            ],
            [
                'Hassell, Tom',
                'tom.hassell@intel.com'
            ],
            [
                'Hill, Roy',
                'roy.hill@intel.com'
            ],
            [
                'Moran, Adam D',
                'adam.d.moran@intel.com'
            ],
            [
                'Raymond, Craig V',
                'craig.v.raymond@intel.com'
            ],
            [
                'Vranizan, Charles W',
                'charles.w.vranizan@intel.com'
            ],
            [
                ' Wridge, RyanX S',
                'ryanx.s.wridge@intel.com'
            ],
            [
                'Gendimenico, Mike',
                'mike.gendimenico@intel.com'
            ],
            [
                'Ivanov, Dmitry',
                'dmitry.ivanov@intel.com'
            ],
            [
                'Larsen, MichaelX',
                'michaelx.larsen@intel.com'
            ],
            [
                'Lomas, ChristopherX A',
                'christopherx.a.lomas@intel.com'
            ],
            [
                'Baier, Michael',
                'michael.baier@intel.com'
            ],
            [
                'Devoe, Rebecca B',
                'rebecca.b.devoe@intel.com'
            ],
            [
                'Harp, Lisa A',
                'lisa.a.harp@intel.com'
            ],
            [
                'Cragle, KarenX',
                'karenx.cragle@intel.com'
            ],
            [
                'Love, KendraX V',
                'kendrax.v.love@intel.com'
            ],
            [
                'Leithner, Jill A',
                'jill.a.leithner@intel.com'
            ],
            [
                'Wallaert, MarkX J',
                'markx.j.wallaert@intel.com'
            ],
            [
                'De La Cruz, PatrickX G',
                'patrickx.g.de.la.cruz@intel.com'
            ],
            [
                'Baldock, Louis A',
                'louis.a.baldock@intel.com'
            ],
            [
                'Killeen, Kristine',
                'kristine.killeen@intel.com'
            ],
            [
                'Sadovnikova, Anna V',
                'anna.v.sadovnikova@intel.com'
            ],
            [
                'Wheeler, KenX J',
                'kenx.j.wheeler@intel.com'
            ],
            [
                'Rabii, Reza',
                'reza.rabii@intel.com'
            ],
            [
                'Sheldon, Sara B',
                'sara.b.sheldon@intel.com'
            ],
            [
                'Hernandez, LaurenX',
                'laurenx.hernandez@intel.com'
            ],
            [
                'Edwards, Christopher',
                'christopher.edwards@intel.com'
            ],
            [
                'Schumacher, Kathi A',
                'kathi.a.schumacher@intel.com'
            ],
            [
                'Collins, MarcusX',
                'marcusx.collins@intel.com'
            ],
            [
                'Enriquez, Robert J',
                'robert.j.enriquez@intel.com'
            ],
            [
                'Feusier, KevinX',
                'kevinx.feusier@intel.com'
            ],
            [
                'Paiga, Barry A',
                'barry.a.paiga@intel.com'
            ],
            [
                'Kokoletsos, Greg',
                'greg.kokoletsos@intel.com'
            ],
            [
                'Creitz, Thaine',
                'thaine.creitz@intel.com'
            ],
            [
                'Howell, Phil',
                'phil.howell@intel.com'
            ],
            [
                'Lambden, Simon',
                'simon.lambden@intel.com'
            ],
            [
                'Anderson, ScottX E',
                'scottx.e.anderson@intel.com'
            ],
            [
                'Williford, RickX',
                'rickx.williford@intel.com'
            ],
            [
                'Saechou, Farm P',
                'farm.p.saechou@intel.com'
            ],
            [
                'Forsberg, Kirsten',
                'kirsten.forsberg@intel.com'
            ],
            [
                'Wong, Eileen',
                'eileen.wong@intel.com'
            ],
            [
                'Smith, Tara',
                'tara.smith@intel.com'
            ],
            [
                'Massey, Scott',
                'scott.massey@intel.com'
            ],
            [
                'Merry, Tina R',
                'tina.r.merry@intel.com'
            ],
            [
                'Mangano, Claudine A',
                'claudine.a.mangano@intel.com'
            ],
            [
                'Bailey, Jill',
                'jill.bailey@intel.com'
            ],
            [
                'Johnson, Daniel',
                'daniel.johnson@intel.com',
            ],
            [
                'Scheer, David',
                'david.scheer@intel.com'
            ],
            [
                'Shedbalkar, Harsha',
                'harsha.shedbalkar@intel.com'
            ],
            [
                'Hui, Roland',
                'roland.hui@intel.com'
            ],
            [
                'Okamoto, Masakata',
                'masakata.okamoto@intel.com'
            ],
            [
                'Naciri, Majd',
                'majd.naciri@intel.com'
            ],
            [
                'Hansen, Ratika',
                'ratika.hansen@intel.com'
            ],
            [
                'Lee, Alex C',
                'alex.c.lee@intel.com'
            ],
            [
                'Kim, Jm',
                'jm.kim@intel.com'
            ],
            [
                'Richmond, Joshua H',
                'joshua.h.richmond@intel.com'
            ],
            [
                'Chan, Oliver T',
                'oliver.t.chan@intel.com'
            ],
            [
                'Wan, Blendy',
                'blendy.wan@intel.com'
            ],
            [
                'Sartain, Drew G',
                'drew.g.sartain@intel.com'
            ],
            [
                'Koning, Johan',
                'Johan.Koning@intel.com'
            ],
            [
                'Pickerrell, Ted',
                'ted.pickerrell@intel.com'
            ],
            [
                'Parker, Mark A',
                'mark.a.parker@intel.com'
            ],
            [
                'Costa, Lance',
                'lance.costa@intel.com'
            ],
            [
                'Granchalek, Ryan R',
                'ryan.r.granchalek@intel.com'
            ],
            [
                'Moore, Gina',
                'gina.moore@intel.com'
            ],
            [
                'Wu, Jing',
                'jing.wu@intel.com'
            ],
            [
                'Yang, Doyle',
                'doyle.yang@intel.com'
            ],
            [
                'Takeuchi, Diane C',
                'diane.c.takeuchi@intel.com'
            ],
            [
                'Hu, Picken',
                'picken.hu@intel.com'
            ],
            [
                'Chiu, Shardae',
                'shardae.chiu@intel.com'
            ],
            [
                'Chen, Nikki',
                'nikki.chen@intel.com'
            ],
            [
                'Chen, JessieX',
                'jessiex.chen@intel.com'
            ],
            [
                'Wang, Sherry',
                'sherry.wang@intel.com'
            ],
            [
                'Lin, Kevin S',
                'kevin.s.lin@intel.com'
            ],
            [
                'Gueron, Michelle N',
                'michelle.n.gueron@intel.com'
            ],
            [
                'Wang, Timothy',
                'timothy.wang@intel.com'
            ],
            [
                'Wu, Jr-wei',
                'jr-wei.wu@intel.com'
            ],
            [
                'Williams, La Tiffaney T',
                'la.tiffaney.t.williams@intel.com'
            ],
            [
                'Shetty, Avinash P',
                'avinash.p.shetty@intel.com'
            ],
            [
                'Ziller, Jason',
                'jason.ziller@intel.com'
            ],
            [
                'Vaughan, Matthew O - TME',
                'matthew.o.vaughan@intel.com'
            ],
            [
                'Tenorio, Pamela L',
                'pamela.l.tenorio@intel.com'
            ],
            [
                'Bienvenue, Sarah E',
                'sarah.e.bienvenue@intel.com'
            ],
            [
                'Cobb, Joshua JX',
                'joshua.jx.cobb@intel.com'
            ],
            [
                'Warnke, Lyle C',
                'lyle.c.warnke@intel.com'
            ],
            [
                'System aquisition - Sanchez, Joaquin',
                'joaquin.sanchez@intel.com'
            ],
            [
                'Ben, Jeffrey P',
                'jeffrey.p.ben@intel.com'
            ],
            [
                'Granchalek, Kelly N',
                'kelly.n.granchalek@intel.com'
            ],
            [
                'Gordon, Beth R',
                'beth.r.gordon@intel.com'
            ],
            [
                'Webb, John P',
                'John.P.Webb@intel.com'
            ],
            [
                'Nguyen, Khoi D',
                'khoi.d.nguyen@intel.com'
            ],
            [
                'Algstam, Joakim',
                'joakim.algstam@intel.com'
            ],
            [
                'Ceran, Serhan',
                'serhan.ceran@intel.com'
            ],
            [
                'Sena, Giovanni',
                'giovanni.sena@intel.com'
            ],
            [
                'Lauwaert, Xavier',
                'xavier.lauwaert@intel.com'
            ],
            [
                'Hamberger, Fredrik',
                'fredrik.hamberger@intel.com'
            ],
            [
                'Sech, Lindsey A',
                'lindsey.a.sech@intel.com'
            ],
            [
                'Dean, Beth E',
                'beth.e.dean@intel.com'
            ],
            [
                'Love, Shannon G',
                'shannon.g.love@intel.com'
            ],
            [
                'Harter, Megan M',
                'megan.m.harter@intel.com'
            ],
            [
                'Vera, Tony',
                'tony.vera@intel.com'
            ],
            [
                'Kolady, Kris',
                'kris.kolady@intel.com'
            ],
            [
                'Oh, Bobby Y',
                'bobby.y.oh@intel.com'
            ],
            [
                'Geanta, Teodora',
                'teodora.geanta@intel.com'
            ]
        ];

        foreach ($data as $dataRow)
        {
            $member = new \common\models\Member([
                'name' => $dataRow[0],
                'email' => $dataRow[1],
            ]);

            if (!$member->save()) {
                $errors = $member->getFirstErrors();
                $error = reset($errors);
                throw new \Exception((string)$error);
            }
        }

    }

    public function safeDown()
    {
        $tableName = \common\models\Member::tableName();
        $this->dropForeignKey('fk-member-user_id', $tableName);

        $this->dropTable($tableName);
    }
}
