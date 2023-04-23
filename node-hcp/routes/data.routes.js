module.exports = app => {
    const data = require("../controllers/data.controller.js");
  
    // Create a new data
    app.post("/data", data.create);
  
    // Retrieve all data
    app.get("/data", data.findAll);
  
    // Retrieve a single data with dataId
    app.get("/data/:dataId", data.findOne);

    // Retrieve data with indicateur ID 
    app.get("/databyindicateur/:indicateurId", data.findAllbyindicateur);
  
    app.get("/databi/:indicateurId", data.findAllbydbi);

    // Update a data with dataId
    app.put("/data/:dataId", data.update);
  
    // Delete a data with dataId
    app.delete("/data/:dataId", data.delete);
  
    // Create a new data
    app.delete("/data", data.deleteAll);
  };