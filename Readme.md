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

| Naam               | Hex-code  | Voorbeeld |
|--------------------|----------|-----------|
| **Deep Crimson**   | `#AD0003` | <span style="display:inline-block;width:20px;height:20px;background-color:#AD0003;"></span> |
| **Bright Scarlet** | `#C60002` | <span style="display:inline-block;width:20px;height:20px;background-color:#C60002;"></span> |
| **Vivid Red**      | `#E00000` | <span style="display:inline-block;width:20px;height:20px;background-color:#E00000;"></span> |
| **Soft Coral**     | `#ED8C8C` | <span style="display:inline-block;width:20px;height:20px;background-color:#ED8C8C;"></span> |
| **Blush Pink**     | `#F6B4B4` | <span style="display:inline-block;width:20px;height:20px;background-color:#F6B4B4;"></span> |
| **Pastel Rose**    | `#FFDADA` | <span style="display:inline-block;width:20px;height:20px;background-color:#FFDADA;"></span> |
| **Deep Teal**      | `#007586` | <span style="display:inline-block;width:20px;height:20px;background-color:#007586;"></span> |
| **Bright Cyan Blue** | `#009EB0` | <span style="display:inline-block;width:20px;height:20px;background-color:#009EB0;"></span> |
| **Sky Blue**       | `#8AC4D0` | <span style="display:inline-block;width:20px;height:20px;background-color:#8AC4D0;"></span> |
| **Pale Ice Blue**  | `#B0D8E1` | <span style="display:inline-block;width:20px;height:20px;background-color:#B0D8E1;"></span> |
| **Soft Ivory** (Lichte achtergrond en tekst in darkmode) | `#FAF9F6` | <span style="display:inline-block;width:20px;height:20px;background-color:#FAF9F6;border:1px solid #ddd;"></span> |
| **Charcoal Black** (Donkere achtergrond en tekst in lightmode) | `#1A1A1A` | <span style="display:inline-block;width:20px;height:20px;background-color:#1A1A1A;"></span> |

---

####  Fonts

- **Bodytekst:** [Nunito](https://fonts.google.com/specimen/Nunito) (Sans-serif)  
- **Headings:** [Zilla Slab](https://fonts.google.com/specimen/Zilla+Slab) (Slab-serif)  

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