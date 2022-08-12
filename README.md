# Outspot_Tryouts

Hieronder vindt u mijn opmerkingen, realisaties en bevindingen terug over de gemaakte test.

## Gebruikte tools

* Visual Studio Code
* Laravel-framework: geïnstalleerd via Composer


## Tijdsindeling
1. De voorbereiding duurde circa twee uur. Dit omvatte het bestuderen van de documentatie, het kiezen van de tools en ook het klaarzetten van de werkomgeving.
2. Voor de uitwerking heb ik mij gericht op een twee tot drietal uur zoals eerder aangegeven. 
3. Het schrijven van de documentatie heb ik tijdens het project aangevuld. Hier rekende ik op een halfuur tot één uur.

## Uitdagingen
* Het gebruik van het Laravel-framework en de Mollie-API was volledig nieuw voor mij. Ik spendeerde een tweetal uur aan het bestuderen van de documentatie van Laravel en Mollie. Hier wou ik voornamelijk letten op de valkuilen en obstakels die het framework en de API met zich meebrengen.
* Het opzetten van de werkomgeving ging stroef. Een technische fout bij het toevoegen van Mollie aan Laravel ging mis en zo verloor ik tijd. 
* Persoonlijk ben ik niet tevreden met het uitgewerkte resultaat van de test. Met de kennis van andere programmeertalen kon ik hier vooruitgang boeken, maar er vergt een inspanning voor PHP en Laravel. Deze test hielp me bij het opfrissen van de vaardigheid en ik ben bereid om me hier nog verder in te verdiepen. Dit is een vaardigheid waar ik de volgende weken op wil toespitsen en ik zie mezelf in staat om op zeker twee weken tijd een opmerkelijke vooruitgang te kan boeken.

## Persoonlijke toevoegingen / Zaken die ik anders had gedaan:
* Zelf twijfelde ik over de meest efficiënte manier van het 'opsturen' van het formulier. Online vond ik voorbeelden terug van zowel GET als POST-requests.
* Hier wil ik opnieuw toevoegen dat ik op het vlak van PHP-ontwikkeling zeker nog vooruitgang wil boeken. Mijn kennis over het Laravel-framework is op twee dagen tijd sterk verbeterd, maar ik ben ervan overtuigd dat dit met inzet over een periode van één tot twee weken nog sterk zal verbeteren. Ik baseer me op het aanleren van voorafgaande programmeertalen.


## Werkwijze
Allereerst heb ik een simpele HTML-layout opgebouwd waarin ik de verschillende stukken content in ging plaatsen. De inhoud van de webpagina gaat, door middel van een ingebouwde CSS-stylesheet, altijd gecentreerd staan. De verschillende PHP-blades gaan de lay-out overerven. Om bij aanvang de juiste webpagina te tonen heb ik bij ```web.php``` een Route geschreven om het formulier aan te maken. 

Ik heb drie controllers aangemaakt: PageController, FormController en MollieController. Op deze manier kon ik een gestructureerd overzicht bijhouden van de verschillende methoden op de webapplicatie.
* De Pagecontroller dient om de indexpagina weer te geven.
* De FormController dient om de functies aan te spreken die specifiek dienen voor het formulier die de prijs bevat. Deze controller bevat twee functies: create en store. De create-functie gaat het formulier in de lay-out plakken. De store-functie gaat eerst kijken of de ingegeven waarde geldig is en daarna zal er een 
* De MollieController dient om de API aan te maken en vervolgens de betaling aan te maken. Er zijn twee functies: nieuweBetaling en toonStatus. 'nieuweBetaling' maakt met behulp van de Mollie-API een nieuwe betaling aan met de gekozen prijs als variabele. Deze prijs wordt eerst gecontroleerd op numerieke waarde en of deze valt binnen de grenzen (groter dan 10, kleiner dan 100). De gebruiker wordt na succesvol invullen van het formulier doorgestuurd naar de checkoutpagina van Mollie. 'toonStatus' gaat de huidige status van de bestelling gaan weergeven door middel van het doorlopen van de betalingen en de betaling met de passende (unieke) omschrijving te gaan selecteren.





## Opmerkingen over Mollie:
* Een keuze die ik heb laten liggen was over het gebruik van een GET. Op deze manier had ik vanuit de URL het bedrag kunnen ophalen. Uit de documentatie bleek dat ik best een POST-request vermeed, want dit leidde tot problemen bij verschillende betaalmethoden waaronder 'Ideal'.
