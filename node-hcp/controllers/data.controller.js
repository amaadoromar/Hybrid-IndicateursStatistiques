const data = require("../models/data.model.js");

exports.create = (req, res) => {
  // Validate request
  if (!req.body) {
    res.status(400).send({
      message: "Content can not be empty!"
    });
  }

  // Create a data
  const data = new data({
    name: req.body.name
  });

  // Save data in the database
  data.create(data, (err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while creating the data."
      });
    else res.send(data);
  });
};

exports.findOne = (req, res) => {
  data.findById(req.params.dataId, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found data with id ${req.params.dataId}.`
        });
      } else {
        res.status(500).send({
          message: "Error retrieving data with id " + req.params.dataId
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

  data.updateById(
    req.params.dataId,
    new data(req.body),
    (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found data with id ${req.params.dataId}.`
          });
        } else {
          res.status(500).send({
            message: "Error updating data with id " + req.params.dataId
          });
        }
      } else res.send(data);
    }
  );
};

exports.delete = (req, res) => {
  data.remove(req.params.dataId, (err, data) => {
    if (err) {
      if (err.kind === "not_found") {
        res.status(404).send({
          message: `Not found data with id ${req.params.dataId}.`
        });
      } else {
        res.status(500).send({
          message: "Could not delete data with id " + req.params.dataId
        });
      }
    } else res.send({ message: `data was deleted successfully!` });
  });
};

exports.deleteAll = (req, res) => {
  data.removeAll((err, data) => {
    if (err)
      res.status(500).send({
        message:
          err.message || "Some error occurred while removing all Categorys."
      });
    else res.send({ message: `All Categorys were deleted successfully!` });
  });
};

exports.findAll = (req, res) => {
    data.getAll((err, data) => {
      if (err)
        res.status(500).send({
          message:
            err.message || "Some error occurred while retrieving customers."
        });
      else res.send(data);
    });
  };

  exports.findAllbyindicateur = (req, res) => {
    data.findByIndicateurId(req.params.indicateurId, (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found data with indicateur id ${req.params.indicateurId}.`
          });
        } else {
          res.status(500).send({
            message: "Error retrieving data with indicateur id " + req.params.indicateurId
          });
        }
      } else res.send(data);
    });
  };

  exports.findAllbydbi = (req, res) => {
    data.findBydbi(req.params.indicateurId, (err, data) => {
      if (err) {
        if (err.kind === "not_found") {
          res.status(404).send({
            message: `Not found data with indicateur id ${req.params.indicateurId}.`
          });
        } else {
          res.status(500).send({
            message: "Error retrieving data with indicateur id " + req.params.indicateurId
          });
        }
      } else res.send(data);
    });
  };