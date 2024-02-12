<div id="switcher">
    <div class="switcher box-color dark-white text-color" id="sw-theme">
        <a href ui-toggle-class="active" target="#sw-theme" class="box-color dark-white text-color sw-btn">
            <i class="fa fa-gear"></i>
        </a>
        <div class="box-divider"></div>
        <div class="box-body">
            <p class="hidden-md-down">
                <label class="md-check m-y-xs" data-target="folded">
                    <input type="checkbox">
                    <i class="green"></i>
                    <span class="hidden-folded">Folded Aside</span>
                </label>
                <label class="md-check m-y-xs" data-target="boxed">
                    <input type="checkbox">
                    <i class="green"></i>
                    <span class="hidden-folded">Boxed Layout</span>
                </label>
                <label class="m-y-xs pointer" ui-fullscreen>
                    <span class="fa fa-expand fa-fw m-r-xs"></span>
                    <span>Fullscreen Mode</span>
                </label>
            </p>
            <p>Colors:</p>
            <p data-target="themeID">
                <label class="radio radio-inline m-0 ui-check ui-check-color ui-check-md"
                    data-value="{primary:'primary', accent:'accent', warn:'warn'}">
                    <input type="radio" name="color" value="1">
                    <i class="primary"></i>
                </label>
                <label class="radio radio-inline m-0 ui-check ui-check-color ui-check-md"
                    data-value="{primary:'accent', accent:'cyan', warn:'warn'}">
                    <input type="radio" name="color" value="2">
                    <i class="accent"></i>
                </label>
                <label class="radio radio-inline m-0 ui-check ui-check-color ui-check-md"
                    data-value="{primary:'warn', accent:'light-blue', warn:'warning'}">
                    <input type="radio" name="color" value="3">
                    <i class="warn"></i>
                </label>
                <label class="radio radio-inline m-0 ui-check ui-check-color ui-check-md"
                    data-value="{primary:'success', accent:'teal', warn:'lime'}">
                    <input type="radio" name="color" value="4">
                    <i class="success"></i>
                </label>
                <label class="radio radio-inline m-0 ui-check ui-check-color ui-check-md"
                    data-value="{primary:'info', accent:'light-blue', warn:'success'}">
                    <input type="radio" name="color" value="5">
                    <i class="info"></i>
                </label>
                <label class="radio radio-inline m-0 ui-check ui-check-color ui-check-md"
                    data-value="{primary:'blue', accent:'indigo', warn:'primary'}">
                    <input type="radio" name="color" value="6">
                    <i class="blue"></i>
                </label>
                <label class="radio radio-inline m-0 ui-check ui-check-color ui-check-md"
                    data-value="{primary:'warning', accent:'grey-100', warn:'success'}">
                    <input type="radio" name="color" value="7">
                    <i class="warning"></i>
                </label>
                <label class="radio radio-inline m-0 ui-check ui-check-color ui-check-md"
                    data-value="{primary:'danger', accent:'grey-100', warn:'grey-300'}">
                    <input type="radio" name="color" value="8">
                    <i class="danger"></i>
                </label>
            </p>
            <p>Themes:</p>
            <div data-target="bg" class="row no-gutter text-u-c text-center _600 clearfix">
                <label class="p-a col-sm-6 light pointer m-0">
                    <input type="radio" name="theme" value="" hidden>
                    Light
                </label>
                <label class="p-a col-sm-6 grey pointer m-0">
                    <input type="radio" name="theme" value="grey" hidden>
                    Grey
                </label>
                <label class="p-a col-sm-6 dark pointer m-0">
                    <input type="radio" name="theme" value="dark" hidden>
                    Dark
                </label>
                <label class="p-a col-sm-6 black pointer m-0">
                    <input type="radio" name="theme" value="black" hidden>
                    Black
                </label>
            </div>
        </div>
    </div>
</div>