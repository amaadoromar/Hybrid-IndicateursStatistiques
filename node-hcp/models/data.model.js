const sql = require("./db.js");

// constructor
const data = function(data) {
  this.name = data.name;
};

data.create = (newdata, result) => {
  sql.query("INSERT INTO data SET ?", newdata, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    console.log("created data: ", { id: res.insertId, ...newdata });
    result(null, { id: res.insertId, ...newdata });
  });
};

data.findById = (dataId, result) => {
  sql.query(`SELECT * FROM data WHERE id_data = ${dataId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found data: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found data with the id
    result({ kind: "not_found" }, null);
  });
};

data.findByIndicateurId = (indicateurId, result) => {
  sql.query(`SELECT * FROM data,periodes,indicateurs WHERE data.id_indicateur=indicateurs.id_indicateur and data.id_annee = periodes.id_annee and data.id_indicateur = ${indicateurId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found data: ", res);
      result(null, res);
      return;
    }

    // not found data with the id
    result({ kind: "not_found" }, null);
  });
};

data.findBydbi = (indicateurId, result) => {
  sql.query(`SELECT annee,data.valeur,definition FROM data,periodes,indicateurs WHERE data.id_indicateur=indicateurs.id_indicateur and data.id_annee = periodes.id_annee and data.id_indicateur = ${indicateurId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found data: ", res);
      result(null, res);
      return;
    }

    // not found data with the id
    result({ kind: "not_found" }, null);
  });
};

data.getAll = result => {
  sql.query("SELECT * FROM data", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("data: ", res);
    result(null, res);
  });
};

data.updateById = (id, data, result) => {
  sql.query(
    "UPDATE data SET name = ? WHERE id_data = ?",
    [data.name, id],
    (err, res) => {
      if (err) {
        console.log("error: ", err);
        result(null, err);
        return;
      }

      if (res.affectedRows == 0) {
        // not found data with the id
        result({ kind: "not_found" }, null);
        return;
      }

      console.log("updated data: ", { id: id, ...data });
      result(null, { id: id, ...data });
    }
  );
};

data.remove = (id, result) => {
  sql.query("DELETE FROM data WHERE id_data = ?", id, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    if (res.affectedRows == 0) {
      // not found data with the id
      result({ kind: "not_found" }, null);
      return;
    }

    console.log("deleted data with id: ", id);
    result(null, res);
  });
};

data.removeAll = result => {
  sql.query("DELETE FROM data", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log(`deleted ${res.affectedRows} data`);
    result(null, res);
  });
};

module.exports = data;