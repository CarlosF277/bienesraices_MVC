/// <reference types="cypress" />

describe("Prueba la seccion de login", () => {

    it("Prueba la autenticacion en /login", ()=>{
        cy.visit("/login");

        cy.get('[data-cy="heading-login"]').should("exist");
        cy.get('[data-cy="heading-login"]').should("have.text", "Iniciar sesion");
        cy.get('[data-cy="formulario-login"]').should("exist");

        //ambos campos son obligatorios
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[data-cy="alerta-login"]').should("exist");

        cy.get('[data-cy="alerta-login"]').eq(0).should("have.class", "error");
        cy.get('[data-cy="alerta-login"]').eq(0).should("have.text", "El email es obligatorio");

        cy.get('[data-cy="alerta-login"]').eq(1).should("have.class", "error");
        cy.get('[data-cy="alerta-login"]').eq(1).should("have.text", "La contraseña es obligatoria");


        //El usuario existe
        


        //verificar el password


    })

});