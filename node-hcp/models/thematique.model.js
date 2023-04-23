const sql = require("./db.js");

// constructor
const Thematique = function(Thematique) {
  this.name = Thematique.name;
};

Thematique.create = (newcategory, result) => {
  sql.query("INSERT INTO thematiques SET ?", newcategory, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    console.log("created Thematique: ", { id: res.insertId, ...newcategory });
    result(null, { id: res.insertId, ...newcategory });
  });
};

Thematique.findById = (thematiqueId, result) => {
  sql.query(`SELECT * FROM thematiques,categories WHERE thematiques.id_categories = categories.id and id_thematique = ${thematiqueId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found Thematique: ", res[0]);
      result(null, res[0]);
      return;
    }

    // not found Thematique with the id
    result({ kind: "not_found" }, null);
  });
};

Thematique.findByCategoryId = (CategoryId, result) => {
  sql.query(`SELECT * FROM thematiques,categories WHERE thematiques.id_categories = categories.id and thematiques.id_categories = ${CategoryId}`, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(err, null);
      return;
    }

    if (res.length) {
      console.log("found Thematique: ", res);
      result(null, res);
      return;
    }

    // not found Thematique with the id
    result({ kind: "not_found" }, null);
  });
};



Thematique.getAll = result => {
  sql.query("SELECT * FROM thematiques", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log("thematiques: ", res);
    result(null, res);
  });
};

Thematique.updateById = (id, Thematique, result) => {
  sql.query(
    "UPDATE thematiques SET name = ? WHERE id_thematique = ?",
    [Thematique.name, id],
    (err, res) => {
      if (err) {
        console.log("error: ", err);
        result(null, err);
        return;
      }

      if (res.affectedRows == 0) {
        // not found Thematique with the id
        result({ kind: "not_found" }, null);
        return;
      }

      console.log("updated Thematique: ", { id: id, ...Thematique });
      result(null, { id: id, ...Thematique });
    }
  );
};

Thematique.remove = (id, result) => {
  sql.query("DELETE FROM thematiques WHERE id_thematique = ?", id, (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    if (res.affectedRows == 0) {
      // not found Thematique with the id
      result({ kind: "not_found" }, null);
      return;
    }

    console.log("deleted Thematique with id: ", id);
    result(null, res);
  });
};

Thematique.removeAll = result => {
  sql.query("DELETE FROM thematiques", (err, res) => {
    if (err) {
      console.log("error: ", err);
      result(null, err);
      return;
    }

    console.log(`deleted ${res.affectedRows} thematiques`);
    result(null, res);
  });
};

module.exports = Thematique;