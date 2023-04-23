const sql = require("./db.js");

// constructor
const indicateur = function(indicateur) {
  this.name = indicateur.name;
};

indicateur.create = (newindicateur, result) => {
  sql.query("INSERT INTO indicateurs SET ?", newindicateur, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    console.log("created indicateur: ", { id: res.insertId, ...newindicateur });
    result(null, { id: res.insertId, ...newindicateur });
  });
};

indicateur.findBycategoryId = (categoryId, result) => {
  sql.query(`SELECT * FROM indicateurs WHERE id_categories = ${categoryId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found indicateur: ", res);
      result(null, res);
      return;
    }

    // not found indicateur with the id
    result({ kind: "not_found" }, null);
  });
};

indicateur.findByThematiqueId = (ThematiqueId, result) => {
  sql.query(`SELECT * FROM indicateurs WHERE id_thematique = ${ThematiqueId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found indicateur: ", res);
      result(null, res);
      return;
    }

    // not found indicateur with the id
    result({ kind: "not_found" }, null);
  });
};

indicateur.findById = (indicateurId, result) => {
  sql.query(`SELECT * FROM indicateurs WHERE id_indicateur = ${indicateurId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found indicateur: ", res);
      result(null, res);
      return;
    }

    // not found indicateur with the id
    result({ kind: "not_found" }, null);
  });
};

indicateur.getAll = result => {
  sql.query("SELECT * FROM indicateurs,categories where indicateurs.id_categories = categories.id", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("indicateurs: ", res);
    result(null, res);
  });
};



indicateur.updateById = (id, indicateur, result) => {
  sql.query(
    "UPDATE indicateurs SET name = ? WHERE id_indicateur = ?",
    [indicateur.name, id],
    (err, res) => {
      if (err) {
        console.log("error: ", err);
        result(null, err);
        return;
      }

      if (res.affectedRows == 0) {
        // not found indicateur with the id
        result({ kind: "not_found" }, null);
        return;
      }

      console.log("updated indicateur: ", { id: id, ...indicateur });
      result(null, { id: id, ...indicateur });
    }
  );
};

indicateur.remove = (id, result) => {
  sql.query("DELETE FROM indicateurs WHERE id_indicateur = ?", id, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    if (res.affectedRows == 0) {
      // not found indicateur with the id
      result({ kind: "not_found" }, null);
      return;
    }

    console.log("deleted indicateur with id: ", id);
    result(null, res);
  });
};

indicateur.removeAll = result => {
  sql.query("DELETE FROM indicateurs", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log(`deleted ${res.affectedRows} indicateurs`);
    result(null, res);
  });
};

module.exports = indicateur;