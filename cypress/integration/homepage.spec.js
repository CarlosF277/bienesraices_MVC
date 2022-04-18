/// <reference types="cypress" />

describe("Carga la pagina principal", ()=>{

    it("Prueba el header de la pagina principal" ,() => {
        cy.visit("/"); //toma la url base del json

       //api para obtener los objetos de la pagina web

        cy.get('[data-cy="heading-sitio"]').should("exist"); //obtiene un elemento con el selector de atributo
        cy.get('[data-cy="heading-sitio"]').invoke("text").should("equal", "Venta de departamentos  y casas exclusivos de lujo  "); //para leer si el texto esta presente, despues verifica que el texto sea igual a lo que se tiene
        cy.get('[data-cy="heading-sitio"]').invoke("text").should("not.equal", "Ventade departamentos  y casas exclusivos de lujo  "); //ahora verifica que no se cumpla

    });


    it("Prueba el bloque de los iconos principales" , ()=>{

        cy.get('[data-cy="heading-nosotros"]').should("exist");
        cy.get('[data-cy="heading-nosotros"]').should("have.prop", "tagName").should("equal", "H2");

        //selecciona los icnos
        cy.get('[data-cy="iconos-nosotros"]').should("exist");
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should("have.length", 3); //busca dentro del eleemento padre
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should("not.have.length", 4);
    });

    it("Prueba la seccion de propiedades" , ()=>{

        //Debe haber 3 propiedades
        cy.get('[data-cy="anuncio"]').should("have.length", 3);
        cy.get('[data-cy="anuncio"]').should("not.have.length", 5);

        //probar el enlace de las propieaddes

        cy.get('[data-cy="enlace-propiedad"]').should("have.class", "boton-amarillo-block");
        cy.get('[data-cy="enlace-propiedad"]').should("not.have.class", "boton-amarillo");
        cy.get('[data-cy="enlace-propiedad"]').first().invoke("text").should("equal", "ver propiedad"); //first toma el primer elemento//considera mayusculas y minusculas y espacios en blanco

        //Probar el enlace a una propiedad
        cy.get('[data-cy="enlace-propiedad"]').first().click();
        cy.get('[data-cy="titulo-propiedad"]').should("exist"); // se va a la direccion del boton y despues verifica que el titulo exista ahi
       
        cy.wait(1000); //ms, espera antes de ejecutar la siguiente prueba
        cy.go("back");//regresa a la pagina principal despues de las pruebas

    });

    it("Prueba el routing hacia todas las propiedades", ()=>{

        cy.get('[data-cy="todas-propiedades"]').should("exist");
        cy.get('[data-cy="todas-propiedades"]').should("have.class","boton-verde");
        cy.get('[data-cy="todas-propiedades"]').invoke('attr', "href").should("equal", "/propiedades");//tambien permite probar atributos de html con attr

        cy.get('[data-cy="todas-propiedades"]').click();
        cy.get('[data-cy="heading-propiedades"]').invoke("text").should("equal", "Casas y depas en venta");

        cy.wait(1000);
        cy.go("back");

    });

    it("Prueba el bloque de contacto", ()=>{

         cy.get('[data-cy="imagen-contacto"]').should("exist");
         cy.get('[data-cy="imagen-contacto"]').find("h2").invoke("text").should("equal", "Encuentra la casa de tus sueños");
         cy.get('[data-cy="imagen-contacto"]').find("p").invoke("text").should("equal", "LLena el formulario y nos contactaremos contigo");

         cy.get('[data-cy="imagen-contacto"]').find("a").invoke('attr', 'href').then(href =>{

            cy.visit(href);
         });//lee directamente el enlace asignado sin indicarlo con promise

         cy.get('[data-cy="heading-contacto"]').should("exist");
         
         cy.wait(1000);
         cy.visit("/");// cuando se ocupan promises para visitar hay que ocupar visit


    });

});