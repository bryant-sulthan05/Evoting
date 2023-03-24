<style>
    footer {
        padding: 22px;
        text-align: center;
    }

    .scrollup {
        background-color: #13cfac;
        color: #1f2833;
        border-radius: 100%;
        width: 50px;
        height: 50px;
        float: right;
        margin: 10px;
        border: 2px solid #1f2833;
    }

    .scrollup:hover {
        background-color: #1f2833;
        color: #13cfac;
        border: #13cfac 2px solid;
        border-radius: 100%;
        width: 50px;
        height: 50px;
        margin: 10px;
        transform: scale(1.05);
        transition: all 0.3s ease-in-out;
    }

    @media only screen and (min-width: 992px) {
        .footer {
            position: relative;
            bottom: 0px;
            left: 0px;
            right: 0px;
        }
    }
</style>

<div class="footer">
    <button class="scrollup fixed-bottom ms-auto">
        <span class="fw-bold"><i class="bi bi-chevron-up"></i></span>
    </button>
    <footer class="text-light" style="background-color: #1f2833;">
        <span>
            <strong>
                Copyright &copy; Bryant Sulthan Nugroho & Destuti
            </strong>
        </span>
    </footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
</script>