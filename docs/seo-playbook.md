# Playbook: Google Search Console + Unternehmensprofil (Websters)

> Für den Menschen + seine Laptop-KI mit Browser-Steuerung.
> Prinzip: Die KI liest diesen Schritt, führt ihn im Browser mit dir aus,
> hakt den Checkpoint ab und geht erst dann weiter. Nichts überspringen.

**Stand der Website (schon erledigt, musst du nicht prüfen):**
Sitemap `https://websters.at/sitemap.xml`, robots.txt offen, Google-Verifizierungscode
im Code, Canonicals, strukturierte Daten, Stadtseiten, llms.txt.

---

## Teil A – Google Search Console (ca. 45 Min einmalig)

### A1. Property anlegen
1. Gehe zu `https://search.google.com/search-console` (mit dem Google-Konto einloggen,
   das auch das Unternehmensprofil besitzt – ein Konto für alles).
2. Klick **„Property hinzufügen"** → **Domain** (NICHT URL-Präfix) → `websters.at` eingeben.
   - Warum Domain: deckt `https://`, `http://`, `www` und alle Subdomains in einer Property ab.
3. **Checkpoint:** Search Console zeigt „Inhaberschaft wird bestätigt … DNS-Bestätigung erforderlich"
   mit einem TXT-Record wie `google-site-verification=...`.

### A2. DNS-TXT bei Cloudflare setzen
1. `https://dash.cloudflare.com` → Domain `websters.at` → **DNS → Records → Add record**.
2. Typ **TXT**, Name `@`, Inhalt = der Verifizierungs-String aus A1, TTL Auto.
3. Zurück in der Search Console auf **„Bestätigen"** klicken (DNS braucht 1–30 Min).
4. **Checkpoint:** Grüner Haken „Inhaberschaft bestätigt". (Der alte Meta-Tag im Code bleibt
   als Backup, muss aber nichts mehr tun.)

### A3. Sitemap einreichen
1. Links-Menü **„Sitemaps"** → URL eingeben: `sitemap.xml` → **Senden**.
2. **Checkpoint:** Status wechselt binnen Stunden auf „Erfolgreich", „13 gefundene URLs".

### A4. Wichtigste URLs manuell zur Indexierung anmelden
1. Oben in die **URL-Prüfung** (Suchleiste) eingeben, nacheinander:
   `https://websters.at/`, `/leistungen/webdesign`, `/leistungen/software`,
   `/leistungen/consulting`, `/webdesign-linz`, `/webdesign-wels`, `/webdesign-steyr`,
   `/tools/domain-check`, `/kontakt`, `/projekte`
2. Pro URL: erst **„URL testen"** (muss „URL ist für Google verfügbar" sagen),
   dann **„Indexierung beantragen"**.
3. **Checkpoint:** Meldung „Indexierung beantragt" pro URL. Wirkung: Tage statt Wochen.

### A5. Bing Webmaster Tools (10 Min, gratis mitnehmen)
1. `https://www.bing.com/webmasters` → **Importieren aus Google Search Console** (ein Klick).
2. Sitemap wird automatisch übernommen. Fertig – Bing + DuckDuckGo + Teile von KI-Suchen
   (Copilot!) hängen an diesem Index.

### A6. Wöchentliche 15-Min-Routine (KI liest dir die Berichte vor)
- **Leistung:** Klicks/Impressionen steigen? Für welche Queries? (Neue Queries = neue Content-Ideen.)
- **Abdeckung/Seiten:** Fehler = 0? „Entdeckt – derzeit nicht indexiert" bei wichtigen URLs →
  erneut Indexierung beantragen (A4).
- **Core Web Vitals:** alles grün? Wenn rot: mir (der Code-KI) Screenshot + URL geben.
- **Links:** Welche externen Seiten verlinken? (Kontrolle, ob Footer-Backlinks ankommen.)

---

## Teil B – Google Unternehmensprofil (ca. 60 Min + Verifizierung)

### B1. Anlegen & Verifizieren
1. `https://www.google.com/business/` → **„Jetzt verwalten"** → Firmenname exakt **`Websters`**
   (KEINE Keywords in den Namen schreiben wie „Websters Webdesign Linz" – das gibt Sperren!).
2. Kategorie (primär): **`Webdesigner`**, zusätzlich: `Softwareunternehmen`, `Internetmarketingdienst`.
3. Adresse: Libellenweg 13, 4209 Engerwitzdorf (exakt wie im Impressum!).
4. **Verifizierung** per Video oder Postkarte durchführen – ohne Haken rankt nichts lokal.
5. **Checkpoint:** Profilstatus „Verifiziert".

### B2. Profil vollständig ausfüllen (Ranking-Faktor!)
- **Beschreibung (750 Zeichen):** Text von der Startseite nehmen (Keywords Webdesign,
  Softwareentwicklung, IT-Consulting, Oberösterreich, Österreich) – ich liefere ihn auf Wunsch.
- **Dienste:** Webdesign, Website-Erstellung, Homepage-Erstellung, Responsive Webdesign,
  WordPress-Website, Landingpage, Website-Relaunch, SEO, Website-Wartung,
  Individualsoftware, Custom Software, Web-App-Entwicklung, API-Entwicklung,
  Systemintegration, Prozessautomatisierung, MVP-Entwicklung, IT-Consulting,
  Prozessoptimierung, Digitalisierungsberatung. **„Mobile Apps" NICHT anlegen** (bieten wir nicht an).
- **Öffnungszeiten:** echte Zeiten eintragen (z. B. Mo–Fr 9–17).
- **Fotos (mind. 10):** Logo, Team/Arbeitsplatz, 3 Screenshots (PriceMatters, lebe-gesund, BeBetter),
  Bürobilder. Dateinamen mit Keywords (`webdesign-linz-websters.jpg` …).
- **Website-Link:** `https://websters.at/` + Terminlink: `https://websters.at/kontakt`.
- **Produkte:** 3 Produkte anlegen (Website Starter 990€, Komplett 1.990€, Custom Software ab 3.490€)
  mit Link auf die Leistungsseiten.

### B3. Bewertungen (stärkster lokaler Hebel)
- 5 ehrliche Bewertungen organisieren (echte Kunden/Bekannte mit echter Erfahrung –
  **niemals kaufen/faken**, Google erkennt das und sperrt).
- Jede Bewertung beantworten (mit Keywords antworten: „Danke für dein Feedback zu unserer Webdesign-Arbeit …").
- **Checkpoint:** 5+ Bewertungen, Schnitt ≥ 4,8.

### B4. Laufend (KI erinnert dich)
- **Beiträge:** 1× pro Woche (Projekt, Angebot, Tipp) mit Foto + Link.
- **Fragen & Antworten:** eigene FAQs ins Profil stellen + beantworten.
- **Fotos:** monatlich neue hochladen (Google liebt frische Aktivität).

---

## Teil C – Rote Linien (nie tun, sonst Penalty/Sperre)

1. Keine gekauften/fake Bewertungen, keine bezahlten Backlinks, keine Linkfarmen.
2. Firmenname im Profil exakt „Websters" – kein Keyword-Stuffing.
3. Adresse nur wenn echt (Briefkastenfirmen fliegen raus).
4. Auf der Website keine erfundenen Personen/Fakten (läuft bereits als separater Fix).

## Zeitplan realistisch

- Woche 1–2: Indexierung aller Seiten, erste Impressionen.
- Monat 1–3: Long-Tail-Rankings (Stadtseiten, Preise, FAQs), erste KI-Zitate bei Nischenfragen.
- Monat 3–6: kompetitive Keywords („Webdesign Linz") angreifbar – mit Profil + Bewertungen + Backlinks.
