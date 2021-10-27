<div class="flex justify-center items-center mt-6 h-full lg:h-screen overflow-auto">
    <div class="grid grid-cols-3 gap-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
        <div class="col-md-12">
{{--            <h1 class="text-center">how to create dynamic pie chart in laravel 8 - websolutionstuff.com</h1>--}}
            <div class="col-xl-6" style="margin-top: 30px; width: auto">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-container">
                            <div class="chart has-fixed-height" id="pie_basic"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            document.addEventListener('livewire:load', function () {
                const pie_basic_element = document.getElementById('pie_basic');
                if (pie_basic_element) {
                    const pie_basic = echarts.init(pie_basic_element);
                    pie_basic.setOption({
                        color: [
                            '#2ec7c9', '#b6a2de', '#5ab1ef', '#ffb980', '#d87a80',
                            '#8d98b3', '#e5cf0d', '#97b552', '#95706d', '#dc69aa',
                            '#07a2a4', '#9a7fd1', '#588dd5', '#f5994e', '#c05050',
                            '#59678c', '#c9ab00', '#7eb00a', '#6f5553', '#c14089'
                        ],

                        textStyle: {
                            fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                            fontSize: 13
                        },

                        title: {
                            text: 'Pie Chart Example',
                            left: 'center',
                            textStyle: {
                                fontSize: 17,
                                fontWeight: 500
                            },
                            subtextStyle: {
                                fontSize: 12
                            }
                        },

                        tooltip: {
                            trigger: 'item',
                            backgroundColor: 'rgba(0,0,0,0.75)',
                            padding: [10, 15],
                            textStyle: {
                                fontSize: 13,
                                fontFamily: 'Roboto, sans-serif'
                            },
                            formatter: "{a} <br/>{b}: {c} ({d}%)"
                        },

                        legend: {
                            orient: 'horizontal',
                            bottom: '0%',
                            left: 'center',
                            data: ['Fruit', 'Vegitable', 'Grains'],
                            itemHeight: 8,
                            itemWidth: 8
                        },

                        series: [{
                            name: 'Product Type',
                            type: 'pie',
                            radius: '70%',
                            center: ['50%', '50%'],
                            itemStyle: {
                                normal: {
                                    borderWidth: 1,
                                    borderColor: '#fff'
                                }
                            },
                            data: [
                                {value: {{$fruit_count}}, name: 'Fruit'},
                                {value: {{$veg_count}}, name: 'Vegitable'},
                                {value: {{$grains_count}}, name: 'Grains'}
                            ]
                        }]
                    })}}

            )
        </script>

    </div>
    <!-- Start Card -->

    <!--End Card -->

    <!-- Start Card -->

    <!--End Card -->

    <!-- Start Card -->

    <!--End Card -->

    <!-- Start Card -->


    <!--End Card -->
</div>
