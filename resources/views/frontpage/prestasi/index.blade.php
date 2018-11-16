<h1 class="ui centered header">Galeri Prestasi</h1><br>

<div class="ui centered grid">
    <div class="computer only four wide column">
        <div class="ui secondary vertical pointing menu prestasi-tab">
            <a class="item active" data-tab="lomba">
                Lomba
            </a>
            <a class="item" data-tab="pkm">
                PKM
            </a>
            <a class="item" data-tab="paper">
                Paper
            </a>
            <a class="item" data-tab="exchange">
                Exchange
            </a>
        </div>
    </div>

    <div class="mobile tablet only sixteen wide center aligned column">
        <div class="ui vertical menu">
            <div class="ui fluid dropdown item">
                Categories
                <i class="dropdown icon"></i>
                <div class="menu prestasi-tab">
                    <a class="item active" data-tab="lomba">
                        Lomba
                    </a>
                    <a class="item" data-tab="pkm">
                        PKM
                    </a>
                    <a class="item" data-tab="paper">
                        Paper
                    </a>
                    <a class="item" data-tab="exchange">
                        Exchange
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="sixteen wide mobile tablet twelve wide computer column">
        <div class="prestasi-content">
            <div class="ui tab active" data-tab="lomba"></div>
            <div class="ui tab" data-tab="pkm"></div>
            <div class="ui tab" data-tab="paper"></div>
            <div class="ui tab" data-tab="exchange"></div>
        </div>
    </div>
</div>



<script>
    $(function() {
        $('.prestasi-tab .item').tab('change tab', 'lomba');
        $(".dropdown").dropdown()
    });

    $('.prestasi-tab .item').tab({
        alwaysRefresh: true,
        cache: false,
        apiSettings: {
            url: '/prestasi/{tab}'
        }
    });
</script>