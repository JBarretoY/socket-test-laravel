$(document).ready(() => {
    $("#signin_form").on('submit', (e) => {
        e.preventDefault();

        var remem = $("#remember").is(":checked") ? true : false;
        login($("#user").val(), $("#password").val(), remem);
    });
});

const login = (user, password, remember) => {
    $.ajax({
        url: '/auth/login',
        data: {
            needle: user,
            password: password,
            remember: remember,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        type: "post",
        success: (data) => {
            if (data['code'] == 200) {
                window.location.href = '/';
            }
        },
        error: err => {
            Object.keys(err.responseJSON.errors).forEach(el => {
                const dom = document.querySelector(`#${el}_validation`)
                if (dom) {
                    dom.innerText = err.responseJSON.errors[el][0]
                }
            })
        }
    });
}
