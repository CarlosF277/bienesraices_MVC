/// <reference types="cypress" />

describe("Prueba el formulario de contacto" , () => {

    it("Prueba la pagina de contacto y el envio de emails", ()=>{
         cy.visit("/contacto");

         cy.get('[data-cy="heading-contacto"]').should("exist");
         cy.get('[data-cy="heading-contacto"]').invoke("text").should("equal", "Contacto");
         cy.get('[data-cy="heading-contacto"]').invoke("text").should("not.equal", "Formulario de contacto");

         cy.get('[data-cy="heading-formulario"]').should("exist");
         cy.get('[data-cy="heading-formulario"]').invoke("text").should("equal", "Llene el formulario de contacto");
         cy.get('[data-cy="heading-formulario"]').invoke("text").should("not.equal", "Formulario de contacto");
         cy.get('[data-cy="formulario-contacto"]').should("exist");

    });

    it("LLEna los campos del formulario", () => {
        cy.get('[data-cy="input-nombre"]').type('Tigre');//Type permite escribir en el campo de texto
        cy.get('[data-cy="input-mensaje"]').type('Deseo compar una casa');
        cy.get('[data-cy="input-opciones"]').select('Compra');
        cy.get('[data-cy="input-presupuesto"]').type("100000");
        cy.get('[data-cy="forma-contacto"]').eq(1).check();//con eq se selecciona el "index" de los radios con el mismo data-cy

        cy.wait(3000);
        cy.get('[data-cy="forma-contacto"]').eq(0).check();//con eq se selecciona el "index" de los radios con el mismo data-cy

        cy.get('[data-cy="input-telefono"]').type("5540529673");
        cy.get('[data-cy="input-fecha"]').type("2021-10-10");
        cy.get('[data-cy="input-hora"]').type("12:30");

        cy.get('[data-cy="formulario-contacto"]').submit(); //presiona el boton de enviar

        cy.get('[data-cy="alerta-envio-formulario"]').should("exist");
        cy.get('[data-cy="alerta-envio-formulario"]').invoke("text").should("equal"," Mensaje enviado correctamente ");
        cy.get('[data-cy="alerta-envio-formulario"]').should("have.class", "alerta").and("have.class", "exito").and("not.have.class", "error"); //para probar multiples clases de un elemento se puede poner un and con la otra clase
    });



});