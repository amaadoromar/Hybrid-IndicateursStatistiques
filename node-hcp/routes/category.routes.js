module.exports = app => {
    const Category = require("../controllers/category.controller.js");
  
    // Create a new category
    app.post("/categories", Category.create);
  
    // Retrieve all categories
    app.get("/categories", Category.findAll);
  
    // Retrieve a single category with categoryId
    app.get("/categories/:CategoryId", Category.findOne);
  
    // Update a category with categoryId
    app.put("/categories/:CategoryId", Category.update);
  
    // Delete a category with categoryId
    app.delete("/categories/:CategoryId", Category.delete);
  
    // Create a new category
    app.delete("/categories", Category.deleteAll);
  };