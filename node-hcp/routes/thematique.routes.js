module.exports = app => {
    const thematique = require("../controllers/thematique.controller.js");
  
    // Create a new thematique
    app.post("/thematiques", thematique.create);
  
    // Retrieve all thematiques
    app.get("/thematiques", thematique.findAll);

    // Retrieve all thematiques by category 
    app.get("/thematiquesbycategory/:CategoryId", thematique.findAllbyCategory);
  
  
    // Retrieve a single thematique with thematiqueId
    app.get("/thematiques/:thematiqueId", thematique.findOne);
  
    // Update a thematique with thematiqueId
    app.put("/thematiques/:thematiqueId", thematique.update);
  
    // Delete a thematique with thematiqueId
    app.delete("/thematiques/:thematiqueId", thematique.delete);
  
    // Create a new thematique
    app.delete("/thematiques", thematique.deleteAll);
  };