<div class="ui grid">
    <div class="four wide column">
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

    <div class="twelve wide stretched column">
        <div class="prestasi-content">
            <div class="ui tab active" data-tab="lomba"></div>
            <div class="ui tab active" data-tab="pkm"></div>
            <div class="ui tab active" data-tab="paper"></div>
            <div class="ui tab active" data-tab="exchange"></div>
        </div>
    </div>
</div>



<script>
    $(function() {
        $('.prestasi-tab .item').tab('change tab', 'lomba');
    });

    $('.prestasi-tab .item').tab({
        alwaysRefresh: true,
        cache: false,
        apiSettings: {
            url: '/prestasi/{tab}'
        }
    });
</script>