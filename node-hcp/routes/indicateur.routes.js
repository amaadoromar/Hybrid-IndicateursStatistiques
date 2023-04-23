module.exports = app => {
    const indicateur = require("../controllers/indicateur.controller.js");
  
    // Create a new indicateur
    app.post("/indicateurs", indicateur.create);
  
    // Retrieve all indicateurs
    app.get("/indicateurs", indicateur.findAll);
	
	// Retrieve all indicateurs
    app.get("/indicateursbycategory/:CategoryId", indicateur.findAllbyCategory);

    // Retrieve all indicateurs
    app.get("/indicateursbythematique/:ThematiqueId", indicateur.findAllbyThematique);
  
    // Retrieve a single indicateur with indicateurId
    app.get("/indicateurs/:indicateurId", indicateur.findOne);
  
    // Update a indicateur with indicateurId
    app.put("/indicateurs/:indicateurId", indicateur.update);
  
    // Delete a indicateur with indicateurId
    app.delete("/indicateurs/:indicateurId", indicateur.delete);
  
    // Create a new indicateur
    app.delete("/indicateurs", indicateur.deleteAll);
  };