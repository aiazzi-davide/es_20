DROP DATABASE IF EXISTS Calcio;
CREATE DATABASE Calcio;
USE Calcio;

CREATE TABLE squadre(
id_squadra int primary key not null,
nome_squadra varchar(50),
citta varchar(50)
);

CREATE TABLE risultato(
id INT PRIMARY KEY AUTO_INCREMENT,
id_squadraVincitrice int not null,
id_squadraPerdente int not null,
goal_squadraVincente int not null,
goal_squadraPerdente int not null,
foreign key (id_squadraVincitrice) references squadre (id_squadra),
foreign key (id_squadraPerdente) references squadre (id_squadra)
on delete cascade on update cascade
);

INSERT INTO squadre(id_squadra, nome_squadra, citta)
VALUES
(1, 'Fiorentina', 'Firenze'),
(2, 'Juventus', 'Torino'),
(3, 'Milan', 'Milano'),
(4, 'Inter', 'Milano'),
(5, 'Atalanta', 'Bergamo'),
(6, 'Bologna', 'Bologna'),
(7, 'Roma', 'Roma'),
(8, 'Freccia Azzurra', 'Novoli'),
(9, 'Lazio', 'Roma'),
(10, 'Napoli', 'Napoli'),
(11, 'Sassuolo', 'Sassuolo'),
(12, 'Torino', 'Torino'),
(13, 'Udinese', 'Udine'),
(14, 'Verona', 'Verona'),
(15, 'Spezia', 'Spezia'),
(16, 'Cagliari', 'Cagliari'),
(17, 'Genoa', 'Genova'),
(18, 'Parma', 'Parma'),
(19, 'Lancers', 'Lastra a Signa'),
(20, 'Scandicci', 'Scandicci');