
BEGIN 

CREATE TABLE [Aliment] (
    [nomAliment] String  NOT NULL ,
    [preparationAliment] String  NOT NULL ,
    [type] String  NOT NULL ,
    CONSTRAINT [PK_Aliment] PRIMARY KEY CLUSTERED (
        [nomAliment] ASC
    )
)

CREATE TABLE [Preparation] (
    [preparationAliment] String  NOT NULL ,
    CONSTRAINT [PK_Preparation] PRIMARY KEY CLUSTERED (
        [preparationAliment] ASC
    )
)

CREATE TABLE [Type] (
    [typeNom] String  NOT NULL ,
    CONSTRAINT [PK_Type] PRIMARY KEY CLUSTERED (
        [typeNom] ASC
    )
)

CREATE TABLE [Recettes] (
    [NomCocktail] String  NOT NULL ,
    [preparation] String  NOT NULL ,
    [ingredient] String  NOT NULL ,
    CONSTRAINT [PK_Recettes] PRIMARY KEY CLUSTERED (
        [NomCocktail] ASC
    )
)

CREATE TABLE [Utilisateur] (
    [id] String  NOT NULL ,
    [nom] String  NOT NULL ,
    [prenom] String  NOT NULL ,
    [mail] String  NOT NULL ,
    [motDePasse] String  NOT NULL ,
    CONSTRAINT [PK_Utilisateur] PRIMARY KEY CLUSTERED (
        [id] ASC
    )
)

CREATE TABLE [Liaison] (
    [nomAliment] String  NOT NULL ,
    [nomCocktail] String  NOT NULL 
)

CREATE TABLE [Panier] (
    [login] String  NOT NULL ,
    [mdp] String  NOT NULL ,
    CONSTRAINT [PK_Panier] PRIMARY KEY CLUSTERED (
        [login] ASC
    )
)

ALTER TABLE [Preparation] WITH CHECK ADD CONSTRAINT [FK_Preparation_preparationAliment] FOREIGN KEY([preparationAliment])
REFERENCES [Aliment] ([preparationAliment])

ALTER TABLE [Preparation] CHECK CONSTRAINT [FK_Preparation_preparationAliment]

ALTER TABLE [Type] WITH CHECK ADD CONSTRAINT [FK_Type_typeNom] FOREIGN KEY([typeNom])
REFERENCES [Aliment] ([type])

ALTER TABLE [Type] CHECK CONSTRAINT [FK_Type_typeNom]

ALTER TABLE [Utilisateur] WITH CHECK ADD CONSTRAINT [FK_Utilisateur_id_motDePasse] FOREIGN KEY([id], [motDePasse])
REFERENCES [Panier] ([login], [mdp])

ALTER TABLE [Utilisateur] CHECK CONSTRAINT [FK_Utilisateur_id_motDePasse]

ALTER TABLE [Liaison] WITH CHECK ADD CONSTRAINT [FK_Liaison_nomAliment] FOREIGN KEY([nomAliment])
REFERENCES [Aliment] ([nomAliment])

ALTER TABLE [Liaison] CHECK CONSTRAINT [FK_Liaison_nomAliment]

ALTER TABLE [Liaison] WITH CHECK ADD CONSTRAINT [FK_Liaison_nomCocktail] FOREIGN KEY([nomCocktail])
REFERENCES [Recettes] ([NomCocktail])

ALTER TABLE [Liaison] CHECK CONSTRAINT [FK_Liaison_nomCocktail]

