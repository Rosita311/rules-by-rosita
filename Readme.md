# Rules by Rosita theme

Ik heb al heel wat jaren een eigen blog [Rules by Rosita](https://www.rulesbyrosita.nl/). Door mijn blog ontdekte ik dat ik developer wilde worden en dat is inmiddels ook gebeurd. 
Het huidige thema dat ik gebriuk is GeneratePress, een heel mooi veelzijdig thema, dat heel goed werkt. Ik ben er erg tevreden over. Sinds ik werk als developer, had ik eigenlijk als wens om ooit een eigen WordPress thema te bouwen. Voor mijn werk bouw ik websites  in WordPress en daarnaast volg ik ook een cursus, waarbij ik een custom thema leer bouwen. Dus ik dacht, waarom bouw ik niet mijn eigen thema. Het voornaamste doel is om ervan te leren. En als het niet gaat, dan kan ik altijd weer terug naar GeneratePress (Nee, we gaan niks jinxen).

Ik ben al een tijdje hierover aan het nadenken en het aan het uitstellen, tot ik afgelopen zondag gewoon maar ermee ben begonnen. 

## Wat ga ik doen

Ik ga een custom WordPress thema bouwen. Ik maak hierbij geen gebruik van een basis thema, maar bouw het zelf vanaf de grond af aan op met HTML, CSS, PHP en Javascript. Mijn thema krijgt de volgende features:

* Responsief en toegankelijk design
* Zilla Slab (headings) & Nunito (body) als fonts
* Dark mode ondersteuning en zoekfunctie

### Extra 

 * Het lijkt me leuk om een custom posttype te maken om de boeken die ik heb gelezen en eventueel nog wil lezen, maar dit is dan ook weer iets wat ik dan moet bijhouden, dus ik ben er nog niet over uit.
 * Ook wil ik iets met animaties doen, ook weer omdat het leuk is, maar ook leerzaam. Het moet wel toegankelijk blijven en echt iets toevoegen aan de website/het thema.

 ## Tot nu toe heb ik gedaan:

 Ik heb een back up gemaakt van mijn blog en alle bestanden gedownload. Daarna heb ik de database geexporteerd. Vervolgens heb ik de website en de database geimporteerd in Local. Het voornaamste wat ik hiervan heb geleerd is hoe ik de URL kon wijzigen via de database. 
 
 De naam van mijn thema wordt Rosita's theme en ik heb in de themes folder een map aangemaakt waarin ik alvast de belangrijkste bestanden in heb gezet:
 * style.css
 * index.php
 * functions.php
 * header.php
 * footer.php
 * screenshot.png

 ### Design
 Ik ben meer van het coderen en bouwen. Design is niet mijn sterkste kant (Op mijn werk heb ik een collega die daar heel goed in is), ik heb dan ook geen design gemaakt, maar ik heb wel een aantal voorbeelden die ik als inspiratie wil gebruiken. Dat is onder andere de blog van [Marijke](https://marijkeluttekes.dev/). Ik vind het design echt prachtig. De kleuren, de eenvoud, de fonts en de darkmode zijn een inspiratie voor dit thema. Ook heb ik gekeken naar het thema Grandblog. Dat is het thema dat ik voor Generatepress had, maar op mijn website om de haverklap voor conflicten zorgde. Toch vond ik het thema erg mooi. En uiteraard komen er ook aspecten terug van mijn huidige blog. De kleuren die ik wil gebruiken komen overeen en de font die ik daar gebruik voor de koppen, komt terug in de body. 

#### Kleuren 

# Rules by Rosita Theme - Color Palette

## Kleurenoverzicht

### Licht thema
| Naam             | Variabele             | Hexcode  |
|-----------------|----------------------|---------|
| Tekst           | --color-text         | `#192324` |
| Tekst (donker)  | --color-text-dark    | `rgba(255, 255, 255, 0.87)` |
| Primair         | --color-primary      | `#D7233E` |
| Accent 1        | --color-accent       | `#F8C9D7` |
| Accent 2        | --color-accent-2     | `#EBEBEB` |
| Footer          | --color-footer       | `#CBEEF3` |
| Contrastkleur   | --color-contrast     | `#49B3C1` |

### Donker thema
| Naam             | Variabele             | Hexcode  |
|-----------------|----------------------|---------|
| Tekst           | --color-text         | `rgba(255, 255, 255, 0.87)` |
| Primair         | --color-primary      | `#D96377` |
| Accent 1        | --color-accent       | `#E38CA6` |
| Accent 2        | --color-accent-2     | `#293A3D` |
| Footer          | --color-footer       | `#103C42` |
| Contrastkleur   | --color-contrast     | `#45A4B0` |
| Achtergrond     | --color-background   | `#192324` |


#### CSS Implementatie
```css
/* Fonts */
body {
    font-family: 'Nunito', sans-serif;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Zilla Slab', serif;
}
```

 ### HTML
 Ik ben ook begonnen met de belangrijkste onderdelen in HTML en CSS (en Javascript) te bouwen. Deze wil ik uploaden naar GitHub, zodat ik feedback van anderen kan ontvangen en hier ook weer van kan leren. Vervolgens wil ik dit allemaal invoegen in het thema. 

 De belangrijkste onderdelen zijn:
 * Een Homepage (Mijn blog had nooit een statische homepage),
 * Een template voor pagina's,
 * Een template voor de archiefpagina's,
 * een template voor de blogberichten (single),
 * een zoekresultatenpagina
 * een card voor alle blogcards. 
 * een stylesheet

## Dinsdag 11 Maart: Header

Ik heb vandaag maar heel weinig energie om iets te doen, dus ik wil vandaag een skiplink maken. Hiervoor gebruik ik [de blog van Josee](https://www.fronteers.nl/nl/blog/2025/01/easy-a11y), die zij tijdens de 12 days of Christmas schreef voor Fronteers. En mocht ik eraan toekomen om de header responsief te maken, dan wil ik dat ook doen. Ik heb dat nog nooit eerder gedaan, dus weer iets leuks om te leren! 

Ik vond het bij nader inzien toch beter om de HTML bestanden direct in het thema te hebben staan, dus ik heb alle bestanden en Git verplaatst, daarna heb ik een Git Rebase gedaan en de dubbele bestanden verwijderd. Nu loopt de lokale repo gelijk met de remote repository.

## Zondag 16 maart: Header, menu en Darkmode

De afgelopen dagen ben ik tussen alles door gewoon verder gegaan met het thema. Het gaat wel langzamer dan dat ik had verwacht, maar dat is niet erg. Ik ben gewoon niet zo snel en ik kom toch een aantal dingen tegen, die dan weer net anders mooeten: Zo heb de afgelopen dagen geleerd, dat het belangrijk is om een soort reset.css te maken, die alle browserstijlen reset. Ik heb hierbij ook geleerd, dat het aan mij is, wat ik daar wel en niet in zet. Ik vond [A Modern CSS Reset](https://www.joshwcomeau.com/css/custom-css-reset/), waarbij Josh de reset.css van Eric Meyer als basis heeft gebruikt en heeft geupdatet. Ik gebruik nu die van Josh en ik pas deze aan, wanneer ik dat nodig vind.

Ook heb ik geleerd over `setAttribute` en `removeAttribute` in Javascript, waarmee je atributen aan de html kan toevoegen en verwijderen. 

En ik heb geleerd dat het goed is om niet op de main branch te werken, maar steeds op een andere branch en deze dan te mergen met de main branch, zodat de main branch goed blijft werken en je makkelijker fouten kunt herstellen. 

De header en het menu zijn voor een groot deel af, nu ben ik bezig met de darkmode en vervolgens wil ik de footer en de cards voor de blog maken. Als dat af is, kopieer ik alle HTML naar de andere template onderdelen en pas ik die weer aan. Daarna kan ik alle HTML toevoegen in de PHP bestanden. 

Ik heb nu ook GitHub CoPilot toegevoegd aan VSCode en dat werkt wel een stuk sneller, dat scheelt een hoop. 
Maar ik sta ervan te kijken hoeveel ik nu al heb geleerd van zelf mijn thema bouwen. Ik word hier echt een beter developer van. :raised_hands:

## Woensdag 19 maart Header is af!

Ik vind mijn header met werkende darkmode af, voor nu. Het is toegankelijk voor schermlezers. Ik vond het wel moeilijk om alles goed werkend en toegankelijk te krijgen. En ook wat er allemaal bij komt kijken en waar je aan kunt denken. De code was gisteren zo vaak gebroken, dat ik dacht, waar ben ik aan begonnen, maar uiteindelijk is het wel gelukt. De header is klaar. Op naar de footer! 

## Vrijdag 21 maart 
Ik heb vandaag met hulp een rebase op de footer gedaan en dus geleerd hoe je een rebase op een branch kan doen. Ook ben ik bezig om de breedte van de body aan te passen.

## Donderdag 27 maart
Ik ben bezig met het maken van de cards, de basis staat er, nu moet er nog een link in komen die het hele kaartje klikbaar maakt. Ik gebruik daarvoor de uitleg van Tina Reis die ze gaf op WordPress Accessibility day en dit artikel over [Inclusive components door Heydon Pickering](https://inclusive-components.design/cards/). Ik had de kaartjes maandag al klikbaar geprobeerd te maken, maar dat mislukte en het lukte me ook niet om terug te gaan naar de laatste commit. Na meerdere merge conflicts heb ik de hele branch verwijderd en ben ik opnieuw begonnen. Nu lijkt het beter te gaan. Daarnaast ben ik ook flink bezig geweest met het ontwerp en de kleuren van de cards en ik heb nu eindelijk een ontwerp waar ik tevreden over ben en kleuren voor de website gevonden, waar ik echt tevreden over ben. Goede kleuren uitkiezen is nog best een klus. Hopelijk vinden anderen het ook mooi. Ook heb ik de footer grotendeels af en de structuur van de homepage staat er al.  

## Vrijdag 4 april
De kaartjes zijn af. Er zijn nog een paar kleine dingen die ik moet checken, daarvoor heb ik hieronder een lijstje gemaakt. Ik vond het heel moeilijk om de stijl een beetje goed te krijgen, maar dat is gelukt. Met de read-more "knop"( het is geen knop), ben ik nog niet helemaal tevreden en ook de volgorde van de schermlezer begrijp ik niet helemaal, dat moet ik nog uitzoeken, maar voor nu zijn de kaartjes af! 

Ook heb ik de fout in het menu op kunnen lossen. 

## Update over de laatste aanpassingen op 27 April 2025

### Responsieve ontwerpverbeteringen

- **Flexibele en responsieve lay-out**: 
  - De layout van de single blogpostpagina (`.single-post-content`) is **verbeterd voor verschillende schermgroottes**. De containers hebben nu **dynamische marges** en **padding** via de `clamp()` functie, wat zorgt voor een **fluidere ervaring** op zowel grotere als kleinere schermen.
  - Het gebruik van `grid` en `flexbox` zorgt ervoor dat de **sidebar en content** netjes uitgelijnd blijven, met een mooie overgang op kleinere schermen (bijvoorbeeld wanneer de **sidebar** onder de **content** schuift op mobiele schermen).

- **Fonts**:
  - Alle **koppen (h1, h2, h3, h4, h5, h6)** gebruiken nu de `clamp()` functie voor **fluid typography**. Dit zorgt ervoor dat de fonts dynamisch schalen afhankelijk van de schermgrootte, met een minimum, voorkeur en maximum grootte.
  - De **paragrafen (`p`)** blijven **vaste 1rem** om leesbaarheid te behouden, maar koppen zullen flexibel schalen voor een betere gebruikerservaring op verschillende schermgroottes.

- **Spacing en padding**:
  - **Padding en margin** zijn dynamisch aangepast voor verschillende schermgroottes met behulp van `clamp()`, zodat er altijd voldoende ruimte is rondom de inhoud, zonder dat het te veel wordt op kleinere schermen.
  - Specifieke aanpassingen zijn gemaakt voor schermen kleiner dan 768px om ervoor te zorgen dat de layout **niet te veel ruimte inneemt**.

### Tabler Icons Integratie

- **Tabler Icons toegevoegd**:
  - **Tabler Icons** zijn toegevoegd via **directe SVG's in de HTML**. Dit maakt het eenvoudig om **vector iconen** te gebruiken voor de verschillende metadata (zoals datum, reacties, categorieën, tags).
  - **Icons in de metadata**:
    - **Datum**: Gebruik van een **calendar** icoon voor de datum.
    - **Reacties**: Icoon voor **commentaar** om het aantal reacties aan te geven.
    - **Leestijd**: Icoon voor **een klok** om de verwachte leestijd weer te geven.
    - **Categorieën en Tags**: **Label** icoon voor categorieën en **tag** icoon voor tags, zodat de gebruiker snel kan zien bij welke onderwerpen de post hoort.

### Verbeteringen aan het gebruik van **CSS** en **media queries**:

- **Gebruik van `clamp()` voor dynamische spacing**: De **gap** tussen de content en de sidebar, evenals de padding, worden nu gecontroleerd met `clamp()` om te zorgen voor een responsieve ervaring op verschillende schermformaten.
- **Media queries** zijn toegevoegd om de layout verder te optimaliseren voor schermen kleiner dan 1250px, 1024px en 768px, waarbij de content en sidebar flexibel reageren op de afmetingen van het scherm.

### Afgeronde secties

- **Header**: De **header** is volledig af en biedt een gestroomlijnde navigatie en visuele stijl voor zowel desktop- als mobiele weergaven.
- **Cards**: De **cards** voor de blogoverzichten zijn volledig ontworpen en responsief, met de juiste spacing en styling voor verschillende schermgroottes.
  - Deze onderdelen moeten echter nog verder worden aangepast voor **WordPress-integratie**.

---

### Wat nog te doen?

- **Homepage en Single Pagina**: De homepage en de single pagina moeten nog verder worden afgemaakt. Er is werk nodig om de pagina's nog verder te optimaliseren en het ontwerp af te ronden.
- **Footer**: De footer moet ook nog verder worden ontwikkeld en geïntegreerd in de lay-out.
- Verdere verfijning van de mobiele weergave, met extra focus op content- en zijbalkafstanden bij verschillende apparaatformaten.
- Verbeteren van de toegankelijkheid van de site, zoals het verbeteren van de contrasten en het toevoegen van meer **aria-labels** en **rolattributen** voor een betere gebruikservaring op schermlezers.

---

## Nog op te lossen
* logo voor donker scherm