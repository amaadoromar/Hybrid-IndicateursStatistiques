const Category = require("../models/category.model.js");

exports.create = (req, res) => {
  // Validate request
  if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }

  // Create a Category
  const Category = new Category({
    name: req.body.name
  });

  // Save Category in the database
  Category.create(Category, (err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while creating the Category."
      });
    else res.send(data);
  });
};

exports.findOne = (req, res) => {
  Category.findById(req.params.CategoryId, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found Category with id ${req.params.CategoryId}.`
        });
      } else {
        res.status(500).send({
          message: "Error retrieving Category with id " + req.params.CategoryId
        });
      }
    } else res.send(data);
  });
};

exports.update = (req, res) => {
  // Validate Request
  if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }

  Category.updateById(
    req.params.CategoryId,
    new Category(req.body),
    (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found Category with id ${req.params.CategoryId}.`
          });
        } else {
          res.status(500).send({
            message: "Error updating Category with id " + req.params.CategoryId
          });
        }
      } else res.send(data);
    }
  );
};

exports.delete = (req, res) => {
  Category.remove(req.params.CategoryId, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found Category with id ${req.params.CategoryId}.`
        });
      } else {
        res.status(500).send({
          message: "Could not delete Category with id " + req.params.CategoryId
        });
      }
    } else res.send({ message: `Category was deleted successfully!` });
  });
};

exports.deleteAll = (req, res) => {
  Category.removeAll((err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while removing all Categorys."
      });
    else res.send({ message: `All Categorys were deleted successfully!` });
  });
};

exports.findAll = (req, res) => {
    Category.getAll((err, data) => {
      if (err)
        res.status(500).send({
          message:
            err.message || "Some error occurred while retrieving customers."
        });
      else res.send(data);
    });
  };