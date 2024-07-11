<!-- Legend Indicator -->
<div class="flex justify-center sm:justify-end items-center gap-x-4 mb-3 sm:mb-6">
    <div class="inline-flex items-center">
        <span class="size-2.5 inline-block bg-blue-600 rounded-sm me-2"></span>
        <span class="text-[13px] text-gray-600 dark:text-neutral-400">
            Income
        </span>
    </div>
    <div class="inline-flex items-center">
        <span class="size-2.5 inline-block bg-purple-600 rounded-sm me-2"></span>
        <span class="text-[13px] text-gray-600 dark:text-neutral-400">
            Outcome
        </span>
    </div>
</div>
<!-- End Legend Indicator -->

<div id="chart-container-<?php echo $index; ?>"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
<script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
function buildAndRenderChart(containerId) {
    buildChart(containerId, (mode) => ({
        chart: {
            height: 300,
            type: 'area',
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },
        series: [{
                name: '2023',
                data: [18000, 51000, 60000, 38000, 88000, 50000, 40000, 52000, 88000,
                    80000, 60000, 70000
                ]
            },
            {
                name: '2022',
                data: [27000, 38000, 60000, 77000, 40000, 50000, 49000, 29000, 42000,
                    27000, 42000, 50000
                ]
            }
        ],
        legend: {
            show: false
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight',
            width: 2
        },
        grid: {
            strokeDashArray: 2
        },
        fill: {
            type: 'gradient',
            gradient: {
                type: 'vertical',
                shadeIntensity: 1,
                opacityFrom: 0.1,
                opacityTo: 0.8
            }
        },
        xaxis: {
            type: 'category',
            tickPlacement: 'on',
            categories: [
                '15 January',
                '15 February',
                '15 March',
                '15 April',
                '15 May',
                '15 June',
                '15 July',
                '15 August',
                '15 September',
                '15 October',
                '15 November',
                '15 December'
            ],
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            crosshairs: {
                stroke: {
                    dashArray: 0
                },
                dropShadow: {
                    show: false
                }
            },
            tooltip: {
                enabled: false
            },
            labels: {
                style: {
                    colors: '#9ca3af',
                    fontSize: '13px',
                    fontFamily: 'Inter, ui-sans-serif',
                    fontWeight: 400
                },
                formatter: (title) => {
                    let t = title;

                    if (t) {
                        const newT = t.split(' ');
                        t = `${newT[1].slice(0, 3)}`;
                    }

                    return t;
                }
            }
        },
        yaxis: {
            labels: {
                align: 'left',
                minWidth: 0,
                maxWidth: 140,
                style: {
                    colors: '#9ca3af',
                    fontSize: '13px',
                    fontFamily: 'Inter, ui-sans-serif',
                    fontWeight: 400
                },
                formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
            }
        },

        responsive: [{
            breakpoint: 568,
            options: {
                chart: {
                    height: 300
                },
                labels: {
                    style: {
                        colors: '#9ca3af',
                        fontSize: '11px',
                        fontFamily: 'Inter, ui-sans-serif',
                        fontWeight: 400
                    },
                    offsetX: -2,
                    formatter: (title) => title.slice(0, 3)
                },
                yaxis: {
                    labels: {
                        align: 'left',
                        minWidth: 0,
                        maxWidth: 140,
                        style: {
                            colors: '#9ca3af',
                            fontSize: '11px',
                            fontFamily: 'Inter, ui-sans-serif',
                            fontWeight: 400
                        },
                        formatter: (value) => value >= 1000 ? `${value / 1000}k` : value
                    }
                },
            },
        }]
    }), {
        colors: ['#2563eb', '#9333ea'],
        fill: {
            gradient: {
                stops: [0, 90, 100]
            }
        },
        xaxis: {
            labels: {
                style: {
                    colors: '#9ca3af'
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: '#9ca3af'
                }
            }
        },
        grid: {
            borderColor: '#e5e7eb'
        }
    }, {
        colors: ['#3b82f6', '#a855f7'],
        fill: {
            gradient: {
                stops: [100, 90, 0]
            }
        },
        xaxis: {
            labels: {
                style: {
                    colors: '#a3a3a3',
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: '#a3a3a3'
                }
            }
        },
        grid: {
            borderColor: '#404040'
        }
    });
}

window.addEventListener('load', () => {
    buildAndRenderChart('#chart-container-<?php echo $index; ?>');
});
</script>