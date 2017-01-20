
-- --------------------------------------------------
-- Entity Designer DDL Script for SQL Server 2005, 2008, 2012 and Azure
-- --------------------------------------------------
-- Date Created: 05/11/2016 16:51:27
-- Generated from EDMX file: C:\Users\Igor\documents\visual studio 2015\Projects\Pessoa\Pessoa\Model\Pessoa.edmx
-- --------------------------------------------------

create database Pessoa;

USE Pessoa;




-- --------------------------------------------------
-- Creating all tables
-- --------------------------------------------------

-- Creating table 'Pessoa'
CREATE TABLE Pessoa (
    Id int auto_increment  NOT NULL,
	Nome varchar(100)  not null,
    Data date  NOT NULL,
    Contato varchar(100)  NOT NULL,
    TipoPessoa smallint  NOT NULL,
    CONSTRAINT PK_Pessoa
    PRIMARY KEY CLUSTERED (Id ASC) 
);



-- Creating table 'PessoaJuridica'
CREATE TABLE PessoaJuridica (
    Id int auto_increment NOT NULL,
    CNPJ nvarchar(100)  NOT NULL ,
    NomeFantasia varchar(100)  NOT NULL,
    InscricaoEstadual nvarchar(100)  NOT NULL,
    PessoaId int  NOT NULL,
    CONSTRAINT PK_PessoaJuridica
    PRIMARY KEY CLUSTERED (Id ASC)
);


-- Creating table 'PessoaFisica'
CREATE TABLE PessoaFisica (
    Id int auto_increment NOT NULL,
    Sobrenome varchar(100)  NOT NULL,
	CPF nvarchar(14)  NOT NULL,
    RG nvarchar(13)  NOT NULL,
    PessoaId int  NOT NULL,
     CONSTRAINT PK_PessoaFisica
    PRIMARY KEY CLUSTERED (Id ASC)
);


-- --------------------------------------------------
-- Creating all PRIMARY KEY constraints
-- --------------------------------------------------

-- Creating primary key on [Id] in table 'Pessoa'
-- ALTER TABLE Pessoa
-- ADD CONSTRAINT PK_Pessoa
--    PRIMARY KEY CLUSTERED (Id ASC) ;


-- Creating primary key on [Id] in table 'PessoaJuridica'
-- ALTER TABLE PessoaJuridica
-- ADD CONSTRAINT PK_PessoaJuridica
--    PRIMARY KEY CLUSTERED (Id ASC);

-- Creating primary key on [Id] in table 'PessoaFisica'
-- ALTER TABLE PessoaFisica
-- ADD CONSTRAINT PK_PessoaFisica
--    PRIMARY KEY CLUSTERED (Id ASC);


-- --------------------------------------------------
-- Creating all FOREIGN KEY constraints
-- --------------------------------------------------

-- Creating foreign key on [PessoaId] in table 'PessoaJuridica'
ALTER TABLE PessoaJuridica
ADD CONSTRAINT FK_PessoaJuridica_Pessoa
    FOREIGN KEY (PessoaId)
    REFERENCES Pessoa
        (Id)
    ON DELETE NO ACTION ON UPDATE NO ACTION;


-- Creating non-clustered index for FOREIGN KEY 'FK_PessoaJuridica_Pessoa'
CREATE INDEX IX_FK_PessoaJuridica_Pessoa
ON  PessoaJuridica
    (PessoaId);


-- Creating foreign key on [PessoaId] in table 'PessoaFisica'
ALTER TABLE PessoaFisica
ADD CONSTRAINT FK_PessoaFisica_Pessoa
    FOREIGN KEY (PessoaId)
    REFERENCES Pessoa
        (Id)
    ON DELETE NO ACTION ON UPDATE NO ACTION;


-- Creating non-clustered index for FOREIGN KEY 'FK_PessoaFisica_Pessoa'
CREATE INDEX IX_FK_PessoaFisica_Pessoa
ON PessoaFisica
    (PessoaId);




-- -----------------------------------------
 -- Creating all UNIQUE KEY constraints
-- ----------------------------------------- 

 -- Creating unique key on [CNPJ] in table 'PessoaJuridica'
 alter table PessoaJuridica
 add constraint UK_PessoaJuridica_CNPJ
 unique key (CNPJ) ;
 
-- Creating non-clustered index for UNIQUE KEY 'UK_PessoaJuridica_CNPJ' 
CREATE INDEX IX_UK_PessoaJuridica_CNPJ
ON  PessoaJuridica
    (CNPJ);
 
 -- Creating unique key on [InscricaoEstadual] in table 'PessoaJuridica'
 alter table PessoaJuridica
 add constraint UK_PessoaJuridica_InscricaoEstadual
 unique key (InscricaoEstadual) ;
 
 -- Creating non-clustered index for UNIQUE KEY 'UK_PessoaJuridica_InscricaoEstadual' 
 CREATE INDEX IX_UK_PessoaJuridica_InscricaoEstadual
ON  PessoaJuridica
    (InscricaoEstadual);
    
    
    
-- Creating unique key on [CPF] in table 'PessoaFisica'
 alter table PessoaFisica
 add constraint UK_PessoaFisica_CPF
 unique key (CPF) ;
 
 
-- Creating non-clustered index for UNIQUE KEY 'UK_PessoaFisica_CPF' 
CREATE INDEX IX_UK_PessoaFisica_CPF
ON  PessoaFisica
    (CPF);
 
 -- Creating unique key on [RG] in table 'PessoaFisica'
 alter table PessoaFisica
 add constraint UK_PessoaFisica_RG
 unique key (RG) ;
 
 -- Creating non-clustered index for UNIQUE KEY 'UK_PessoaFisica_RG' 
 CREATE INDEX IX_UK_PessoaFisica_RG
ON  PessoaFisica
    (RG);



-- alter  table pessoajuridica
-- change column InscricaoeEstadual InscricaoEstadual nvarchar(100) not null;
 

-- --------------------------------------------------
-- Script has ended
-- --------------------------------------------------