const indicateur = require("../models/indicateur.model.js");

exports.create = (req, res) => {
  // Validate request
  if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }

  // Create a indicateur
  const indicateur = new indicateur({
    name: req.body.name
  });

  // Save indicateur in the database
  indicateur.create(indicateur, (err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while creating the indicateur."
      });
    else res.send(data);
  });
};

exports.findOne = (req, res) => {
  indicateur.findById(req.params.indicateurId, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found indicateur with id ${req.params.indicateurId}.`
        });
      } else {
        res.status(500).send({
          message: "Error retrieving indicateur with id " + req.params.indicateurId
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

  indicateur.updateById(
    req.params.indicateurId,
    new indicateur(req.body),
    (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found indicateur with id ${req.params.indicateurId}.`
          });
        } else {
          res.status(500).send({
            message: "Error updating indicateur with id " + req.params.indicateurId
          });
        }
      } else res.send(data);
    }
  );
};

exports.delete = (req, res) => {
  indicateur.remove(req.params.indicateurId, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found indicateur with id ${req.params.indicateurId}.`
        });
      } else {
        res.status(500).send({
          message: "Could not delete indicateur with id " + req.params.indicateurId
        });
      }
    } else res.send({ message: `indicateur was deleted successfully!` });
  });
};

exports.deleteAll = (req, res) => {
  indicateur.removeAll((err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while removing all indicateurs."
      });
    else res.send({ message: `All indicateurs were deleted successfully!` });
  });
};

exports.findAll = (req, res) => {
    indicateur.getAll((err, data) => {
      if (err)
        res.status(500).send({
          message:
            err.message || "Some error occurred while retrieving customers."
        });
      else res.send(data);
    });
  };
  
 exports.findAllbyCategory = (req, res) => {
  indicateur.findBycategoryId(req.params.CategoryId, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found indicateurs with category id ${req.params.CategoryId}.`
        });
      } else {
        res.status(500).send({
          message: "Error retrieving indicateurs with category id " + req.params.CategoryId
        });
      }
    } else res.send(data);
  });
};

exports.findAllbyThematique = (req, res) => {
  indicateur.findByThematiqueId(req.params.ThematiqueId, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found indicateurs with thematique id ${req.params.ThematiqueId}.`
        });
      } else {
        res.status(500).send({
          message: "Error retrieving indicateurs with thematique id " + req.params.ThematiqueId
        });
      }
    } else res.send(data);
  });
};