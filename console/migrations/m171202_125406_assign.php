<?php



class m171202_125406_assign extends \console\models\Migration
{
    /*public function up()
    {

    }

    public function down()
    {
        echo "m171202_125406_assign cannot be reverted.\n";

        return false;
    }*/

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        /*$data = [
            [
                'yuriy.kozachuk@intel.com',
                'GIM'
            ],
            [
                'chris.bulaon@intel.com',
                'GIM'
            ],
            [
                'anthony.w.plasker@intel.com',
                'GIM'
            ],
            [
                'ali.mehdizadeh@intel.com',
                'GIM'
            ],
            [
                'becky.emmett@intel.com',
                'GIM'
            ],
            [
                'tim.e.hansen@intel.com',
                'GIM'
            ],
            [
                'arturo.juarez@intel.com',
                'GIM'
            ],
            [
                'jeffery.lowe@intel.com',
                'GIM'
            ],
            [
                'april.natividad@intel.com',
                'GIM'
            ],
            [
                'stefanie.j.phillips@intel.com',
                'GIM'
            ],
            [
                'nicole.schlappi@intel.com',
                'GIM'
            ],
            [
                'terri.wheeler@intel.com',
                'GIM'
            ],
            [
                'george.woo@intel.com',
                'GIM'
            ],
            [
                'lucas.b.ainsworth@intel.com',
                'EKG Demos'
            ],
            [
                'mark.elston@intel.com',
                'EKG Demos'
            ],
            [
                'diana.l.shea@intel.com',
                'EKG Demos'
            ],
            [
                'david.sidd@intel.com',
                'EKG Demos'
            ],
            [
                'chris.s.raymond@intel.com',
                'EKG Demos'
            ],
            [
                'art.d.webb@intel.com',
                'EKG Demos'
            ],
            [
                'braian.curiel@intel.com',
                'Corp Demos'
            ],
            [
                'charles.a.duvall@intel.com',
                'Corp Demos'
            ],
            [
                'tom.hassell@intel.com',
                'Corp Demos'
            ],
            [
                'roy.hill@intel.com',
                'Corp Demos'
            ],
            [
                'adam.d.moran@intel.com',
                'Corp Demos'
            ],
            [
                'craig.v.raymond@intel.com',
                'Corp Demos'
            ],
            [
                'charles.w.vranizan@intel.com',
                'Corp Demos'
            ],
            [
                'ryanx.s.wridge@intel.com',
                'Corp Demos'
            ],
            [
                'mike.gendimenico@intel.com',
                'Corp Demos'
            ],
            [
                'dmitry.ivanov@intel.com',
                'Corp Demos'
            ],
            [
                'michaelx.larsen@intel.com',
                'Corp Demos'
            ],
            [
                'christopherx.a.lomas@intel.com',
                'Corp Demos'
            ],
            [
                'michael.baier@intel.com',
                'EKG Production'
            ],
            [
                'rebecca.b.devoe@intel.com',
                'EKG Production'
            ],
            [
                'lisa.a.harp@intel.com',
                'EKG Production'
            ],
            [
                'karenx.cragle@intel.com',
                'EKG Production'
            ],
            [
                'kendrax.v.love@intel.com',
                'EKG Production'
            ],
            [
                'jill.a.leithner@intel.com',
                'EKG Production'
            ],
            [
                'markx.j.wallaert@intel.com',
                'EKG Production'
            ],
            [
                'patrickx.g.de.la.cruz@intel.com',
                'EKG Production'
            ],
            [
                'louis.a.baldock@intel.com',
                'EKG Production'
            ],
            [
                'kristine.killeen@intel.com',
                'EKG Production'
            ],
            [
                'anna.v.sadovnikova@intel.com',
                'EKG Production'
            ],
            [
                'kenx.j.wheeler@intel.com',
                'EKG Production'
            ],
            [
                'reza.rabii@intel.com',
                'Demo Depot'
            ],
            [
                'sara.b.sheldon@intel.com',
                'Demo Depot'
            ],
            [
                'laurenx.hernandez@intel.com',
                'Demo Depot'
            ],
            [
                'christopher.edwards@intel.com',
                'Live Events And Production'
            ],
            [
                'kathi.a.schumacher@intel.com',
                'Live Events And Production'
            ],
            [
                'marcusx.collins@intel.com',
                'Live Events And Production'
            ],
            [
                'robert.j.enriquez@intel.com',
                'Live Events And Production'
            ],
            [
                'kevinx.feusier@intel.com',
                'Live Events And Production'
            ],
            [
                'barry.a.paiga@intel.com',
                'Live Events And Production'
            ],
            [
                'greg.kokoletsos@intel.com',
                'Live Events And Production'
            ],
            [
                'thaine.creitz@intel.com',
                'Retail Sales'
            ],
            [
                'phil.howell@intel.com',
                'Retail Sales'
            ],
            [
                'simon.lambden@intel.com',
                'Retail Sales'
            ],
            [
                'scottx.e.anderson@intel.com',
                'Operations-Shipping'
            ],
            [
                'rickx.williford@intel.com',
                'Operations-Shipping'
            ],
            [
                'farm.p.saechou@intel.com',
                'PR'
            ],
            [
                'kirsten.forsberg@intel.com',
                'PR'
            ],
            [
                'eileen.wong@intel.com',
                'PR'
            ],
            [
                'tara.smith@intel.com',
                'PR'
            ],
            [
                'scott.massey@intel.com',
                'GTM'
            ],
            [
                'tina.r.merry@intel.com',
                'GTM'
            ],
            [
                'claudine.a.mangano@intel.com',
                'GTM'
            ],
            [
                'jill.bailey@intel.com',
                'GTM'
            ],
            [
                'daniel.johnson@intel.com',
                'GTM'
            ],
            [
                'david.scheer@intel.com',
                'DCG'
            ],
            [
                'harsha.shedbalkar@intel.com',
                'Mobile Client'
            ],
            [
                'roland.hui@intel.com',
                'Mobile Client'
            ],
            [
                'masakata.okamoto@intel.com',
                'Mobile Client'
            ],
            [
                'majd.naciri@intel.com',
                'Mobile Client'
            ],
            [
                'majd.naciri@intel.com',
                'Mobile Client'
            ],
            [
                'ratika.hansen@intel.com',
                'Regional Sales'
            ],
            [
                'alex.c.lee@intel.com',
                'Samsung Sales'
            ],
            [
                'jm.kim@intel.com',
                'Samsung Sales'
            ],
            [
                'joshua.h.richmond@intel.com',
                'Global Accounts'
            ],
            [
                'oliver.t.chan@intel.com',
                'Lenovo Sales'
            ],
            [
                'blendy.wan@intel.com',
                'Huawei Sales'
            ],
            [
                'drew.g.sartain@intel.com',
                'Dell Sales'
            ],
            [
                'Johan.Koning@intel.com',
                'Partner Marketing'
            ],
            [
                'ted.pickerrell@intel.com',
                'Global Accounts'
            ],
            [
                'mark.a.parker@intel.com',
                'HP Sales'
            ],
            [
                'lance.costa@intel.com',
                'HP Sales'
            ],
            [
                'ryan.r.granchalek@intel.com',
                'HP Sales'
            ],
            [
                'gina.moore@intel.com',
                'HP Sales'
            ],
            [
                'jing.wu@intel.com',
                'CTE Sales'
            ],
            [
                'doyle.yang@intel.com',
                'Xiaomi Sales'
            ],
            [
                'diane.c.takeuchi@intel.com',
                'Asus Regional Sales'
            ],
            [
                'picken.hu@intel.com',
                'Asus Sales'
            ],
            [
                'shardae.chiu@intel.com',
                'Asus Regional Sales'
            ],
            [
                'nikki.chen@intel.com',
                'Acer Regional Sales'
            ],
            [
                'jessiex.chen@intel.com',
                'Acer Sales'
            ],
            [
                'sherry.wang@intel.com',
                'Regional Sales'
            ],
            [
                'kevin.s.lin@intel.com',
                'MSI Sales'
            ],
            [
                'michelle.n.gueron@intel.com',
                'Partner Marketing'
            ],
            [
                'timothy.wang@intel.com',
                'Acer Sales'
            ],
            [
                'jr-wei.wu@intel.com',
                'Client Operations'
            ],
            [
                'la.tiffaney.t.williams@intel.com',
                'Microsoft Global Sales'
            ],
            [
                'avinash.p.shetty@intel.com',
                'NSG'
            ],
            [
                'jason.ziller@intel.com',
                'Thunderbolt 3'
            ],
            [
                'matthew.o.vaughan@intel.com',
                'Thunderbolt 3'
            ],
            [
                'pamela.l.tenorio@intel.com',
                'Smart Home Group'
            ],
            [
                'sarah.e.bienvenue@intel.com',
                'Smart Home Group'
            ],
            [
                'joshua.jx.cobb@intel.com',
                'Smart Home Group'
            ],
            [
                'lyle.c.warnke@intel.com',
                'Smart Home Group'
            ],
            [
                'joaquin.sanchez@intel.com',
                'Mobile Client'
            ],
            [
                'jeffrey.p.ben@intel.com',
                'Mobile Client'
            ],
            [
                'kelly.n.granchalek@intel.com',
                'Mobile Client'
            ],
            [
                'beth.r.gordon@intel.com',
                'Mobile Client'
            ],
            [
                'John.P.Webb@intel.com',
                'Mobile Client'
            ],
            [
                'khoi.d.nguyen@intel.com',
                'Mobile Client'
            ],
            [
                'joakim.algstam@intel.com',
                'Mobile Client'
            ],
            [
                'serhan.ceran@intel.com',
                'Mobile Client'
            ],
            [
                'giovanni.sena@intel.com',
                'Mobile Client'
            ],
            [
                'xavier.lauwaert@intel.com',
                'Mobile Client'
            ],
            [
                'fredrik.hamberger@intel.com',
                'Mobile Client'
            ],
            [
                'lindsey.a.sech@intel.com',
                'Connected Home'
            ],
            [
                'beth.e.dean@intel.com',
                'Connected Home'
            ],
            [
                'shannon.g.love@intel.com',
                'Connected Home'
            ],
            [
                'megan.m.harter@intel.com',
                'Desktop Platform Group'
            ],
            [
                'tony.vera@intel.com',
                'Desktop Platform Group'
            ],
            [
                'kris.kolady@intel.com',
                'Developer Relations'
            ],
            [
                'bobby.y.oh@intel.com',
                'Developer Relations'
            ],
            [
                'teodora.geanta@intel.com',
                'PECA'
            ]
        ];*/

        $csv = <<<CSV
Name,Email,Division,Group,Role,Manager,Comment,,,,,,,,,,
Yuri Kozachuk,yuriy.kozachuk@intel.com,GMC,GIM,TME,,CCG keynote lead; Gaming/SmartHome vertical segments,,,,,,,,,,
"Bulaon, Chris ",chris.bulaon@intel.com,GMC,GIM,TME,,CCG Booth engagements; Virtual Reality,,,,,,,,,, 
" Plasker, Anthony W ",anthony.w.plasker@intel.com,GMC,GIM,TME,,CCG support; Business Client,,,,,,,,,,
" Mehdizadeh, Ali ",ali.mehdizadeh@intel.com,GMC,GIM,TME,,CCG Booth/keynotes; 2-in-1/Thin and light,,,,,,,,,,
" Emmett, Becky ",becky.emmett@intel.com,GMC,GIM,Content,x,Manager-GIM PM/TME,,,,,,,,,,
" Hansen, Tim E ",tim.e.hansen@intel.com,GMC,GIM,PM,,,,,,,,,,,,
" Juarez, Arturo ",arturo.juarez@intel.com,GMC,GIM,PM,,,,,,,,,,,,
" Lowe, Jeffery ",jeffery.lowe@intel.com,GMC,GIM,PM,x,Manager-GIM PM/TME,,,,,,,,,,
" Natividad, April ",april.natividad@intel.com,GMC,GIM,Content,,,,,,,,,,,,
" Phillips, Stefanie J ",stefanie.j.phillips@intel.com,GMC,GIM,PM,,,,,,,,,,,,
" Schlappi, Nicole ",nicole.schlappi@intel.com,GMC,GIM,PM,,,,,,,,,,,,
" Wheeler, Terri ",terri.wheeler@intel.com,GMC,GIM,Content,,,,,,,,,,,,
" Woo, George ",george.woo@intel.com,GMC,GIM,Content,,,,,,,,,,,,
"Ainsworth, Lucas B ",lucas.b.ainsworth@intel.com,GMC,EKG Demos,TME,,,,,,,,,,,,
" Elston, Mark ",mark.elston@intel.com,GMC,EKG Demos,TME,,,,,,,,,,,,
" Shea, Diana L ",diana.l.shea@intel.com,GMC,EKG Demos,TME,,,,,,,,,,,,
" Sidd, David ",david.sidd@intel.com,GMC,EKG Demos,TME,,,,,,,,,,,,
" Raymond, Chris S ",chris.s.raymond@intel.com,GMC,EKG Demos,TME,,,,,,,,,,,,
" Webb, Art D ",art.d.webb@intel.com,GMC,EKG Demos,TME,x,Manager-EKG TMEs,,,,,,,,,,
" Curiel, Braian ",braian.curiel@intel.com,GMC,Corp Demos,TME,,,,,,,,,,,,
" Duvall, Charles A ",charles.a.duvall@intel.com,GMC,Corp Demos,TME,,,,,,,,,,,,
" Hassell, Tom ",tom.hassell@intel.com,GMC,Corp Demos,TME,,Networking Pharaon,,,,,,,,,,
" Hill, Roy ",roy.hill@intel.com,GMC,Corp Demos,TME,,,,,,,,,,,,
" Moran, Adam D ",adam.d.moran@intel.com,GMC,Corp Demos,TME,x,Manager-Ops,,,,,,,,,,
" Raymond, Craig V ",craig.v.raymond@intel.com,GMC,Corp Demos,TME,,,,,,,,,,,,
" Vranizan, Charles W ",charles.w.vranizan@intel.com,GMC,Corp Demos,TME,,KVM Tsar,,,,,,,,,,
" Wridge, RyanX S ",ryanx.s.wridge@intel.com,GMC,Corp Demos,TME,,,,,,,,,,,,
" Gendimenico, Mike ",mike.gendimenico@intel.com,GMC,Corp Demos,TME,,,,,,,,,,,,
" Ivanov, Dmitry ",dmitry.ivanov@intel.com,GMC,Corp Demos,TME,,,,,,,,,,,,
" Larsen, MichaelX ",michaelx.larsen@intel.com,GMC,Corp Demos,TME,,,,,,,,,,,,
" Lomas, ChristopherX A ",christopherx.a.lomas@intel.com,GMC,Corp Demos,TME,,,,,,,,,,,,
"Baier, Michael ",michael.baier@intel.com,GMC,EKG Production,XPM,,,,,,,,,,,,
" Devoe, Rebecca B ",rebecca.b.devoe@intel.com,GMC,EKG Production,XPM,,,,,,,,,,,,
" Harp, Lisa A ",lisa.a.harp@intel.com,GMC,EKG Production,XPM,,,,,,,,,,,,
" Cragle, KarenX ",karenx.cragle@intel.com,GMC,EKG Production,XPM,,,,,,,,,,,,
" Love, KendraX V ",kendrax.v.love@intel.com,GMC,EKG Production,XPM,,,,,,,,,,,,
" Leithner, Jill A ",jill.a.leithner@intel.com,GMC,EKG Production,XPM,x,Manager-XPM/Graphics/Presentation,,,,,,,,,,
" Wallaert, MarkX J ",markx.j.wallaert@intel.com,GMC,EKG Production,Presentations,,,,,,,,,,,,
" De La Cruz, PatrickX G ",patrickx.g.de.la.cruz@intel.com,GMC,EKG Production,Presentations,,,,,,,,,,,,
"Baldock, Louis A ",louis.a.baldock@intel.com,GMC,EKG Production,Graphics,,,,,,,,,,,,
" Killeen, Kristine ",kristine.killeen@intel.com,GMC,EKG Production,Graphics,,,,,,,,,,,,
" Sadovnikova, Anna V ",anna.v.sadovnikova@intel.com,GMC,EKG Production,Graphics,,,,,,,,,,,,
" Wheeler, KenX J ",kenx.j.wheeler@intel.com,GMC,EKG Production,Graphics,,,,,,,,,,,,
"Rabii, Reza ",reza.rabii@intel.com,SMG,Demo Depot,,,,,,,,,,,,,
" Sheldon, Sara B ",sara.b.sheldon@intel.com,SMG,Demo Depot,,,,,,,,,,,,,
" Hernandez, LaurenX ",laurenx.hernandez@intel.com,SMG,Demo Depot,Presentations,,,,,,,,,,,,
"Edwards, Christopher ",christopher.edwards@intel.com,GMC,Live Events And Production,Webcast,x,Manager-Webcast,,,,,,,,,,
" Schumacher, Kathi A ",kathi.a.schumacher@intel.com,GMC,Live Events And Production,Webcast,,,,,,,,,,,,
" Collins, MarcusX ",marcusx.collins@intel.com,GMC,Live Events And Production,Webcast,,,,,,,,,,,,
" Enriquez, Robert J ",robert.j.enriquez@intel.com,GMC,Live Events And Production,Webcast,,,,,,,,,,,,
" Feusier, KevinX ",kevinx.feusier@intel.com,GMC,Live Events And Production,Webcast,,,,,,,,,,,,
" Paiga, Barry A ",barry.a.paiga@intel.com,GMC,Live Events And Production,Webcast,,,,,,,,,,,,
" Kokoletsos, Greg ",greg.kokoletsos@intel.com,GMC,Live Events And Production,Webcast,,,,,,,,,,,,
"Creitz, Thaine ",thaine.creitz@intel.com,SMG,Retail Sales,ASMO Retail,,,,,,,,,,,,
" Howell, Phil ",phil.howell@intel.com,SMG,Retail Sales,TME,,EMEA Retail,,,,,,,,,,
" Lambden, Simon ",simon.lambden@intel.com,SMG,Retail Sales,TME,,EMEA Retail,,,,,,,,,,
"Anderson, ScottX E ",scottx.e.anderson@intel.com,SMG,Operations-Shipping,,,,,,,,,,,,,
" Williford, RickX ",rickx.williford@intel.com,SMG,Operations-Shipping,,,,,,,,,,,,,
"Saechou, Farm P ",farm.p.saechou@intel.com,GMC,PR,,,,,,,,,,,,,
" Forsberg, Kirsten ",kirsten.forsberg@intel.com,GMC,PR,,,,,,,,,,,,,
" Wong, Eileen ",eileen.wong@intel.com,GMC,PR,,,,,,,,,,,,,
" Smith, Tara ",tara.smith@intel.com,GMC,PR,,x,Manager,,,,,,,,,,
"Massey, Scott ",scott.massey@intel.com,GMC,GTM,,,,,,,,,,,,,
" Merry, Tina R ",tina.r.merry@intel.com,GMC,GTM,,,,,,,,,,,,,
" Mangano, Claudine A ",claudine.a.mangano@intel.com,GMC,GTM,,x,Manager,,,,,,,,,,
" Bailey, Jill ",jill.bailey@intel.com,GMC,GTM,,,,,,,,,,,,,
"Johnson, Daniel ",daniel.johnson@intel.com,GMC,GTM,Messaging,,NSG Optane Memory,,,,,,,,,,
" Scheer, David ",david.scheer@intel.com,GMC,DCG,Messaging,,NSG Optane Storage,,,,,,,,,,
"Shedbalkar, Harsha ",harsha.shedbalkar@intel.com,CCG,Mobile Client,Customer Marketing Manager,,Lenovo,,,,,,,,,,
"Shedbalkar, Harsha ",harsha.shedbalkar@intel.com,CCG,Mobile Client,Customer Marketing Manager,,Huawei,,,,,,,,,,
"Hui, Roland ",roland.hui@intel.com,CCG,Mobile Client,Customer Marketing Manager,,Dell,,,,,,,,,,
"Hui, Roland ",roland.hui@intel.com,CCG,Mobile Client,Customer Marketing Manager,,Xiaomi,,,,,,,,,,
"Okamoto, Masakata ",masakata.okamoto@intel.com,CCG,Mobile Client,Customer Marketing Manager,,HP,,,,,,,,,,
"Okamoto, Masakata ",masakata.okamoto@intel.com,CCG,Mobile Client,Customer Marketing Manager,,Asus,,,,,,,,,,
"Naciri, Majd ",majd.naciri@intel.com,CCG,Mobile Client,Customer Marketing Manager,,Acer,,,,,,,,,,
"Naciri, Majd ",majd.naciri@intel.com,CCG,Mobile Client,Customer Marketing Manager,,Samsung,,,,,,,,,,
"Hansen, Ratika ",ratika.hansen@intel.com,SMG,Regional Sales,MDM,,N. America channel enthusiats,,,,,,,,,,
"Lee, Alex C ",alex.c.lee@intel.com,SMG,Samsung Sales,FSE,,Samsung Galaxy Book FSE,,,,,,,,,,
"Kim, Jm ",jm.kim@intel.com,SMG,Samsung Sales,FSE,,Based in Korea,,,,,,,,,,
"Richmond, Joshua H ",joshua.h.richmond@intel.com,SMG,Global Accounts,Comsumption BusDev,,Samsung,,,,,,,,,,
"Chan, Oliver T ",oliver.t.chan@intel.com,SMG,Lenovo Sales,,,Lenovo,,,,,,,,,,
"Wan, Blendy ",blendy.wan@intel.com,SMG,Huawei Sales,,,Huawei,,,,,,,,,,
"Sartain, Drew G ",drew.g.sartain@intel.com,SMG,Dell Sales,,,Dell,,,,,,,,,,
"Koning, Johan ",Johan.Koning@intel.com,GMC,Partner Marketing,,,Dell,,,,,,,,,,
"Pickerrell, Ted ",ted.pickerrell@intel.com,SMG,Global Accounts,Field Sales Manager,,Dell,,,,,,,,,,
"Parker, Mark A ",mark.a.parker@intel.com,SMG,HP Sales,Consumer Sales,,HP,,,,,,,,,,
"Costa, Lance ",lance.costa@intel.com,SMG,HP Sales,WW Commercial Marketing Development Manager/Education,,HP,,,,,,,,,,
"Granchalek, Ryan R ",ryan.r.granchalek@intel.com,SMG,HP Sales,WW Mobile Consumer FSE,,HP,,,,,,,,,,
"Moore, Gina ",gina.moore@intel.com,SMG,HP Sales,,,HP Gaming,,,,,,,,,,
"Wu, Jing ",jing.wu@intel.com,SMG,CTE Sales,,,CTE ODM/OEM/Xiaomi,,,,,,,,,,
"Yang, Doyle ",doyle.yang@intel.com,SMG,Xiaomi Sales,FSE,,Xiaomi,,,,,,,,,,
"Takeuchi, Diane C ",diane.c.takeuchi@intel.com,SMG,Asus Regional Sales,,,Asus,,,,,,,,,,
"Hu, Picken ",picken.hu@intel.com,SMG,Asus Sales,FAE,,Asus Desktop,,,,,,,,,,
"Chiu, Shardae ",shardae.chiu@intel.com,SMG,Asus Regional Sales,,,Asus,,,,,,,,,,
"Chen, Nikki ",nikki.chen@intel.com,SMG,Acer Regional Sales,,,Acer,,,,,,,,,,
"Chen, JessieX ",jessiex.chen@intel.com,SMG,Acer Sales,,,Acer,,,,,,,,,,
"Wang, Sherry ",sherry.wang@intel.com,SMG,Regional Sales,,,Foxconn Accounts,,,,,,,,,,
"Lin, Kevin S ",kevin.s.lin@intel.com,SMG,MSI Sales,,,MSI,,,,,,,,,,
"Gueron, Michelle N ",michelle.n.gueron@intel.com - ,GMC,Partner Marketing,,,Acer/Asus global,,,,,,,,,,
"Wang, Timothy ",timothy.wang@intel.com,SMG,Acer Sales,Acer USA,,Acer,,,,,,,,,,
"Wu, Jr-wei ",jr-wei.wu@intel.com,CCG,Client Operations,,,System Enabling Engineer(SEE)/CCSE/TCE/CCG,,,,,,,,,,
"Williams, La Tiffaney T ",la.tiffaney.t.williams@intel.com,SMG,Microsoft Global Sales,,,Microsoft,,,,,,,,,,
" Shetty, Avinash P ",avinash.p.shetty@intel.com,NSG,NSG,Product Line Manager,,,,,,,,,,,,
"Ziller, Jason ",jason.ziller@intel.com,CCG,Thunderbolt 3,Messaging,x,Manager TB3,,,,,,,,,,
"Vaughan, Matthew O - TME",matthew.o.vaughan@intel.com ,CCG,Thunderbolt 3,TME,,TB3,,,,,,,,,,
"Tenorio, Pamela L ",pamela.l.tenorio@intel.com,CCG,Smart Home Group,Messaging/Manager,,,,,,,,,,,,
" Bienvenue, Sarah E ",sarah.e.bienvenue@intel.com,CCG,Smart Home Group,Messaging,,,,,,,,,,,,
" Cobb, Joshua JX ",joshua.jx.cobb@intel.com,CCG,Smart Home Group,TME,,Smart Home,,,,,,,,,,
" Warnke, Lyle C ",lyle.c.warnke@intel.com,CCG,Smart Home Group,TME,,Lead for Smarthome,,,,,,,,,,
"System aquisition - Sanchez, Joaquin ",joaquin.sanchez@intel.com,CCG,Mobile Client,Platform Marketing Manager,,"KBL system  acquision, SBY",,,,,,,,,,
"Ben, Jeffrey P ",jeffrey.p.ben@intel.com,CCG,Mobile Client,Platform Marketing Manager,,"CFL-H system  acquision, CNL",,,,,,,,,,
"Granchalek, Kelly N ",kelly.n.granchalek@intel.com,CCG,Mobile Client,Business Analyst,,Performance Notebooks,,,,,,,,,,
"Gordon, Beth R ",beth.r.gordon@intel.com,CCG,Mobile Client,TME,,Integrated Graphics Iris/G,,,,,,,,,,
" Webb, John P ",John.P.Webb@intel.com,CCG,Mobile Client,Messaging,x,Manager - Integrated Graphics Iris/G,,,,,,,,,,
"Nguyen, Khoi D ",khoi.d.nguyen@intel.com,CCG,Mobile Client,TME,,Notebooks H series,,,,,,,,,,
" Algstam, Joakim ",joakim.algstam@intel.com,CCG,Mobile Client,PM,,Notebooks H series,,,,,,,,,,
" Ceran, Serhan ",serhan.ceran@intel.com,CCG,Mobile Client,PM,,,,,,,,,,,,
" Sena, Giovanni ",giovanni.sena@intel.com,CCG,Mobile Client,PM,,OEM designs,,,,,,,,,,
" Lauwaert, Xavier ",xavier.lauwaert@intel.com,CCG,Mobile Client,PM,,ODM designs,,,,,,,,,,
" Hamberger, Fredrik ",fredrik.hamberger@intel.com,CCG,Mobile Client,Manager,x,Manager,,,,,,,,,,
"Sech, Lindsey A ",lindsey.a.sech@intel.com,CCG,Connected Home,TME,,,,,,,,,,,,
" Dean, Beth E ",beth.e.dean@intel.com,CCG,Connected Home,TME,,,,,,,,,,,,
" Love, Shannon G ",shannon.g.love@intel.com,CCG,Connected Home,Messaging,x,Manager-Connected Home,,,,,,,,,,
"Harter, Megan M ",megan.m.harter@intel.com,CCG,Desktop Platform Group,Product Marketting Program Manager,,BSF,,,,,,,,,,
"Vera, Tony ",tony.vera@intel.com ,CCG,Desktop Platform Group,Platform Marketing Manager,,X-Series,,,,,,,,,,
"Kolady, Kris ",kris.kolady@intel.com - ,SSG,Developer Relations,,,DPI Application Showcase Marketing (SSG>DRD),,,,,,,,,,
"Oh, Bobby Y ",bobby.y.oh@intel.com,SSG,Developer Relations,Gaming,,,,,,,,,,,,
"Geanta, Teodora ",teodora.geanta@intel.com,BMG,PECA,Comp marketing,,,,,,,,,,,,
CSV;

        $csv = explode("\n", $csv);
        array_shift($csv);
        $data = [];
        foreach ($csv as $row) {
            $r = str_getcsv($row);
            $data[] = [
                trim($r[1], "- \t\n\r\0\x0B"),
                trim($r[3], "- \t\n\r\0\x0B"),
                trim($r[4], "- \t\n\r\0\x0B"),
            ];
        }

        $this->createRole('PR');

        foreach ($data as $row) {
            $member = \common\models\Member::findOne(['email' => $row[0]]);
            if (!$member) {
                throw new \Exception(sprintf('Email %s does not find', $row[0]));
            }

            $user = \common\models\User::findOne(['username' => $row[1]]);
            if (!$user) {
                throw new \Exception(sprintf('User with name %s does not find', $row[1]));
            }

            $role = null;
            if ($row[2]) {
                $roleName = trim($row[2]);
                if ($roleName) {
                    $role = $this->createRole($roleName);
                }
            }

            $member->user_id = $user->id;
            if ($role) {
                $member->role_id = $role->id;
            }

            if (!$member->save()) {
                $this->_throwException($member);
            }
        }
    }

    public function safeDown()
    {
    }

    private function _throwException(\yii\db\ActiveRecord $model)
    {
        $errors = $model->getErrors();

        $message = array();
        foreach ($errors as $attr => $internalErrors) {
            $message[] = $attr . '::' . implode(',', $internalErrors) . ' VALUE:' . $model->$attr;
        }
        throw new \Exception(implode("\r\n", $message));
    }

    private function createRole($roleName)
    {
        $lockRoles = \common\models\event\source\Assigned::getLockRoles();

        $roleQuery = \common\models\member\Role::find();
        $role = $roleQuery
            ->andWhere(['name' => $roleName])
            ->one();

        if (!$role) {
            $role = new \common\models\member\Role();
            $role->setAttributes([
                'name' => $roleName
            ]);

            if (in_array($role->name, $lockRoles, true)) {
                $role->lock_id = $role->name;
            }

            if (!$role->save()) {
                $this->_throwException($role);
            }
        }

        return $role;
    }


}
