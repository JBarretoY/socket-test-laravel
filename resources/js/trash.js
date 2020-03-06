import swal from 'sweetalert';
 
window.Popper = require('popper.js').default;
window.$ = window.jQuery = require('jquery');

require('bootstrap');

$(document).ready(() => {
    $('.card .cuadro').on('click', (e) => {
        $(`.${e.currentTarget.id}`).slideToggle()
    })

    $('.carousel').carousel({
        interval: 0
    })

    $('.publishing-close_button').on('click', () => {
        $('#closable-publishing_popup').slideUp();
    })

    $('.hamburger.hamburger--elastic').on('click', () => {
        $('.fre-search-wrap').slideToggle()
        $('.fre-menu-top').slideToggle()
        $('#account-wrap').slideToggle('medium', function() {
            if ($(this).is(':visible')) {
                $(this).css('display','flex');
            }
        })
    });

    $('.data-search').on('click', (e) => {
        let search = e.target.dataset.search;
        let field = $('.fre-search-field')
        let variant = $('#name_variant')
        if (search === "consultant") {
            field.attr('placeholder', 'Buscar consultor');
        } else {
            field.attr('placeholder', 'Buscar proyecto');
        }

        variant.val(search)
    })

    $('#send_project_invitation').on('click', () => {
        alert('sending...')
    })

    $('[id^=accept_bid]').on('click', (e) => {
        let split = e.target.id.split('_')
        swal({
            title: "Desea aceptar?",
            text: "Esta opción no se de puede deshacer",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((status) => {
              if (status) 
              {
                  $.ajax({
                      url: '/bid/response',
                      type: 'patch',
                      data: {
                          status: 3,
                          bid_id: split[split.length - 1],
                          _token: $('meta[name="csrf-token"]').attr('content')
                      },
                      success: () =>  {
                        swal("Datos actualizados");
                        setTimeout(() => {
                            location.reload()
                        }, 1000)
                      },
                      error: (err) => {
                          swal("No se completo su solicitud, por favor favor verifique sus datos.");
                      }
                  });
              } else {
                  swal("Cancelado")
              }
        });
    })
})
