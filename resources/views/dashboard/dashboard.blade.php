@section('page-title', __tr("Dashboard"))
@section('head-title', __tr("Dashboard"))
@section('keywordName', strip_tags(__tr("Dashboard")))
@section('keyword', strip_tags(__tr("Dashboard")))
@section('description', strip_tags(__tr("Dashboard")))
@section('keywordDescription', strip_tags(__tr("Dashboard")))
@section('page-image', getStoreSettings('logo_image_url'))
@section('twitter-card-image', getStoreSettings('logo_image_url'))
@section('page-url', url()->current())

<div class="lw-dashboard">
    <div class="lw-dashboard-header">
        <h1 class="lw-dashboard-header__title"><?= __tr('Dashboard') ?> <span>Overview</span></h1>
        <p class="lw-dashboard-header__sub"><?= __tr('Monitor users, reports, and earnings at a glance.') ?></p>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="lw-stat-card lw-stat-card--primary">
                <div class="lw-stat-card__icon"><i class="fa-solid fa-signal" aria-hidden="true"></i></div>
                <div>
                    <div class="lw-stat-card__label"><?= __tr("Users Online") ?></div>
                    <div class="lw-stat-card__value">
                        <?= __tr('__onlineUsersCount__', ['__onlineUsersCount__' => $dashboardData['online']]) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="lw-stat-card lw-stat-card--success">
                <div class="lw-stat-card__icon"><i class="fa-solid fa-user-check" aria-hidden="true"></i></div>
                <div>
                    <div class="lw-stat-card__label">
                        <a href="<?= route('manage.user.view_list', ['status' => 1]) ?>"><?= __tr("Active Users") ?></a>
                    </div>
                    <div class="lw-stat-card__value">
                        <?= __tr('__activeUsersCount__', ['__activeUsersCount__' => $dashboardData['active']]) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="lw-stat-card lw-stat-card--info">
                <div class="lw-stat-card__icon"><i class="fa-solid fa-user-clock" aria-hidden="true"></i></div>
                <div>
                    <div class="lw-stat-card__label">
                        <a href="<?= route('manage.user.view_list', ['status' => 2]) ?>"><?= __tr("Inactive Users") ?></a>
                    </div>
                    <div class="lw-stat-card__value">
                        <?= __tr('__inactiveUsersCount__', ['__inactiveUsersCount__' => $dashboardData['inactive']]) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="lw-stat-card lw-stat-card--danger">
                <div class="lw-stat-card__icon"><i class="fa-solid fa-user-slash" aria-hidden="true"></i></div>
                <div>
                    <div class="lw-stat-card__label">
                        <a href="<?= route('manage.user.view_list', ['status' => 3]) ?>"><?= __tr("Blocked Users") ?></a>
                    </div>
                    <div class="lw-stat-card__value">
                        <?= __tr('__blockedUsersCount__', ['__blockedUsersCount__' => $dashboardData['blocked']]) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="lw-stat-card lw-stat-card--warning">
                <div class="lw-stat-card__icon"><i class="fa-solid fa-flag" aria-hidden="true"></i></div>
                <div>
                    <div class="lw-stat-card__label">
                        <a href="<?= route('manage.abuse_report.read.list', ['status' => 1]) ?>"><?= __tr("Awaiting Abuse Reports") ?></a>
                    </div>
                    <div class="lw-stat-card__value">
                        <?= __tr('__awaitingAbuseReportsCount__', ['__awaitingAbuseReportsCount__' => $dashboardData['awaiting_abuse_report_count']]) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="lw-stat-card lw-stat-card--pink">
                <div class="lw-stat-card__icon"><i class="fa-solid fa-sack-dollar" aria-hidden="true"></i></div>
                <div>
                    <div class="lw-stat-card__label"><?= __tr("Current Month Earnings") ?></div>
                    <div class="lw-stat-card__value">
                        <?= __tr('__currencyCode__ __currentMonthIncome__', [
                            '__currencyCode__' => $dashboardData['currency'],
                            '__currentMonthIncome__' => $dashboardData['current_month_income']
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 mb-4">
            <div class="card shadow mb-4 lw-chart-card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= __tr("Earnings Overview") ?></h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 mb-4">
            <div class="card shadow mb-4 lw-chart-card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= __tr('Last 12 Month Registrations') ?></h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart2" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@lwPush('appScripts')
<script type="text/javascript">
    var year = @json($dashboardData['labels']),
    currency = '<?= $dashboardData['currency'] ?>';
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: year,
            datasets: [{
                label: "{{ __tr('Earnings') }}",
                lineTension: 0.3,
                backgroundColor: "rgba(131, 56, 236, 0.12)",
                borderColor: "#DF0D78",
                pointRadius: 3,
                pointBackgroundColor: "rgba(255,255,255, 1)",
                pointBorderColor: "#8338EC",
                pointHoverRadius: 4,
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "#DF0D78",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: <?= json_encode($dashboardData['month_wise_income']) ?>,
            }],
        },
        options: {
            locale : window.appConfig.locale,
            maintainAspectRatio: false,
            layout: {
                padding: { left: 10, right: 25, top: 25, bottom: 0 }
            },
            legend: { display: false },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#1B012C",
                titleMarginBottom: 10,
                titleFontColor: '#8338EC',
                titleFontSize: 14,
                borderColor: '#EDE8F4',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + currency + tooltipItem.yLabel;
                    }
                }
            }
        }
    });

    var ctx2 = document.getElementById("myAreaChart2");
    var myLineChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: year,
            datasets: Object.values(<?= json_encode($dashboardData['current_year_registrations']) ?>),
        },
        options: {
            locale : window.appConfig.locale,
            maintainAspectRatio: false,
            layout: {
                padding: { left: 10, right: 25, top: 25, bottom: 0 }
            },
            legend: { display: false },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#1B012C",
                titleMarginBottom: 10,
                titleFontColor: '#DF0D78',
                titleFontSize: 14,
                borderColor: '#EDE8F4',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + tooltipItem.yLabel;
                    }
                }
            }
        }
    });
</script>
@lwPushEnd
