const thematique = require("../models/thematique.model.js");

exports.create = (req, res) => {
  // Validate request
  if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }

  // Create a thematique
  const thematique = new thematique({
    name: req.body.name
  });

  // Save thematique in the database
  thematique.create(thematique, (err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while creating the thematique."
      });
    else res.send(data);
  });
};

exports.findOne = (req, res) => {
  thematique.findById(req.params.thematiqueId, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found thematique with id ${req.params.thematiqueId}.`
        });
      } else {
        res.status(500).send({
          message: "Error retrieving thematique with id " + req.params.thematiqueId
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

  thematique.updateById(
    req.params.thematiqueId,
    new thematique(req.body),
    (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found thematique with id ${req.params.thematiqueId}.`
          });
        } else {
          res.status(500).send({
            message: "Error updating thematique with id " + req.params.thematiqueId
          });
        }
      } else res.send(data);
    }
  );
};

exports.delete = (req, res) => {
  thematique.remove(req.params.thematiqueId, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found thematique with id ${req.params.thematiqueId}.`
        });
      } else {
        res.status(500).send({
          message: "Could not delete thematique with id " + req.params.thematiqueId
        });
      }
    } else res.send({ message: `thematique was deleted successfully!` });
  });
};

exports.deleteAll = (req, res) => {
  thematique.removeAll((err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while removing all Categorys."
      });
    else res.send({ message: `All Categorys were deleted successfully!` });
  });
};

exports.findAll = (req, res) => {
    thematique.getAll((err, data) => {
      if (err)
        res.status(500).send({
          message:
            err.message || "Some error occurred while retrieving customers."
        });
      else res.send(data);
    });
  };

  exports.findAllbyCategory = (req, res) => {
    thematique.findByCategoryId(req.params.CategoryId, (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found thematique with Category id ${req.params.CategoryId}.`
          });
        } else {
          res.status(500).send({
            message: "Error retrieving thematique with Category id " + req.params.CategoryId
          });
        }
      } else res.send(data);
    });
  };