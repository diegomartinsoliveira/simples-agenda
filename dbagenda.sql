-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema dbagenda
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbagenda
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbagenda` DEFAULT CHARACTER SET utf8 ;
USE `dbagenda` ;

-- -----------------------------------------------------
-- Table `dbagenda`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbagenda`.`usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `senha` VARCHAR(15) NOT NULL,
  `celular` INT(10) NOT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbagenda`.`agendamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbagenda`.`agendamentos` (
  `id_agendamento` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `data` DATETIME NOT NULL,
  `descricao` LONGTEXT NOT NULL,
  `local` VARCHAR(100) NULL,
  `status` TINYINT NULL,
  `contato` VARCHAR(100) NULL,
  PRIMARY KEY (`id_agendamento`),
  CONSTRAINT `fk_usuario_agendamento`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `dbagenda`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



insert into usuarios (nome, email, senha, celular) values
('diego','diego@diego.com','diego123','479999999');

select * from usuarios;

insert into agendamentos (id_usuario, nome, data, descricao, local, status, contato) values
(1,'Diego Martins de Oliveira','2023-04-05 12:30:30','Cortar o cabelo','Rua Ataulfo Alves, Comasa','1','47996219374');

select ag.data, ag.descricao, ag.local, us.nome, us.email from agendamentos as ag
inner join usuarios as us
on ag.id_usuario = us.id_usuario
where ag.id_agendamento = 2;

select * from agendamentos;
select * from usuarios;

delete from agendamentos where id_agendamento = 7;

SELECT id_agendamento, nome, data, descricao, local, status, contato  
                    FROM agendamentos
                    ORDER BY id_agendamento DESC;