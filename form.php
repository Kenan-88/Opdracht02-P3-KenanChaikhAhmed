<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>maakzelfjepizza</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <main class="container">
      <form action="create.php" method="post" class="form-inline">
        <div class="form-group">
          <label for="format">Bodemformaat</label>
          <select id="format" name="format" class="form-control">
            <option value="20">Maak je keuze</option>
            <option value="20">20cm</option>
            <option value="25">25cm</option>
            <option value="30">30cm</option>
            <option value="35">35cm</option>
            <option value="40">40cm</option>
            <option value="40">40cm</option>
          </select>
        </div>
        <label for="saus">Saus</label>
        <select id="saus" name="saus" class="form-control">
          <option value="">Saus</option>
          <option value="tomatensaus">Tomatensaus</option>
          <option value="extraTomatensaus">Extra tomatensaus</option>
          <option value="spicy">Spicy tomatensaus</option>
          <option value="bbq">BBQ saus</option>
          <option value="creme">Creme fraiche</option>
        </select>
        <label for="topping">Pizzatoppings</label>
        <label for="vegan">
          <input type="radio" name="topping" id="vegan" value="vegan" />
          vegan</label
        >
        <label for="vegetarisch">
          <input
            type="radio"
            name="topping"
            id="vegetarisch"
            value="vegetarisch"
          />
          vegetarisch</label
        >
        <label for="vlees">
          <input type="radio" name="topping" id="vlees" value="vlees" />
          vlees</label
        >
        <label for="kruiden">kruiden</label>
        <label for="peterselie">
          <input
            type="checkbox"
            name="kruiden"
            id="peterselie"
            value="peterselie"
          />
          Peterselie</label
        >
        <label for="oregano">
          <input type="checkbox" name="kruiden" id="oregano" value="oregano" />
          Oregano</label
        >
        <label for="chili-flakes">
          <input
            type="checkbox"
            name="kruiden[]"
            id="chili-flakes"
            value="Chili flakes"
          />
          Chili flakes</label
        >
        <label for="zwarte-peper">
          <input
            type="checkbox"
            name="kruiden[]"
            id="zwarte-peper"
            value="zwarte peper"
          />
          zwarte peper</label
        >
        <button type="submit">Bestel</button>
      </form>
    </main>
  </body>
</html>
