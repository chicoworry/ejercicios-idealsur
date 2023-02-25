USE idealsur;

SELECT sexo, AVG(edad) FROM usuarios GROUP BY sexo;