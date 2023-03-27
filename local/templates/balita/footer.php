<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!-- END main-content -->
</div>
<div class="col-md-12 col-lg-4 sidebar">
    <div class="sidebar-box search-form-wrap">
        <form action="#" class="search-form">
            <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
            </div>
        </form>
    </div>
    <!-- END sidebar-box -->
    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
            "AREA_FILE_SHOW"=> "file",
            "PATH" => "/include/person.php",
            "EDIT_TEMPLATE" => "standard.php"
        )
    );?>
    <!-- END sidebar-box -->
    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
            "AREA_FILE_SHOW"=> "file",
            "PATH" => "/include/popular_posts.php",
            "EDIT_TEMPLATE" => "standard.php"
        )
    );?>
    <!-- END sidebar-box -->

    <?$APPLICATION->IncludeComponent("bitrix:main.include","",Array(
            "AREA_FILE_SHOW"=> "file",
            "PATH" => "/include/categories.php",
            "EDIT_TEMPLATE" => "standard.php"
        )
    );?>
    <!-- END sidebar-box -->

</div>
<!-- END sidebar -->

</div>
</div>
</section>
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<?=date('Y',time());?> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
<!-- END footer -->

<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>


</body>
</html>