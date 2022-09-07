<?php echo'搬砖不易 | 请勿盗版 | Powered By随然 | QQ: 201825640';die();?>
{if $zbp->Config('suiranx_nav')->day30_switch=="1"}
<script src="https://cdn.staticfile.org/echarts/4.6.0/echarts.min.js"></script> 
<div class="part">
    <p class="tt"><span>浏览统计(最近30天)</span></p>  
    <div class="items">
        <div id="echart">
            <script type="text/javascript">
                var dom = document.getElementById("echart");
                var myChart = echarts.init(dom);
                var app = {};  
                
                
                option = null;
                option = {
                            color: ['#ef1616'],
                            tooltip: {
                                trigger: 'axis',
                            },
                                calculable : true,
                    grid: {
                                left: '2%',
                                top: '25px',
                                right: '2%',
                                bottom: '60px',
                                containLabel: true
                            },
                    dataZoom: [{   // 这个dataZoom组件，默认控制x轴。
                                   type: 'slider', // 这个 dataZoom 组件是 slider 型 dataZoom 组件
                                   start: 50,      // 左边在 10% 的位置。
                                   end: 100         // 右边在 60% 的位置。
                                                       
                               }],          
                    xAxis: [{
                                type: 'category',
                                splitLine: {
                                    show: false
                                },                
                                axisLine: {
                                    show: !1
                                },
                                axisTick: {
                                    show: !1
                                },
                                axisLabel: {
                                    show: true,
                                    margin: 20,                   
                                    textStyle: {
                                        color: '#999',
                                        'fontSize': 12,
                                    }
                                },               
                                boundaryGap:false,
                              data: ['{suiranx_nav_date1()}', '{suiranx_nav_date2()}', '{suiranx_nav_date3()}', '{suiranx_nav_date4()}', '{suiranx_nav_date5()}', '{suiranx_nav_date6()}', '{suiranx_nav_date7()}', '{suiranx_nav_date8()}', '{suiranx_nav_date9()}', '{suiranx_nav_date10()}', '{suiranx_nav_date11()}', '{suiranx_nav_date12()}', '{suiranx_nav_date13()}', '{suiranx_nav_date14()}', '{suiranx_nav_date15()}', '{suiranx_nav_date16()}', '{suiranx_nav_date17()}', '{suiranx_nav_date18()}', '{suiranx_nav_date19()}', '{suiranx_nav_date20()}', '{suiranx_nav_date21()}', '{suiranx_nav_date22()}', '{suiranx_nav_date23()}', '{suiranx_nav_date24()}', '{suiranx_nav_date25()}', '{suiranx_nav_date26()}', '{suiranx_nav_date27()}', '{suiranx_nav_date28()}', '{suiranx_nav_date29()}', '{suiranx_nav_date30()}']
                            }],
                             
                    yAxis: [{
                                type: 'value',
                                axisLine: {
                                    lineStyle: {
                                        color: ["#c1c6ca"]
                                    }
                                },
                                axisLabel: {
                                    show: !1,
                                    inside: true
                                },
                                splitLine: {
                                    lineStyle: {
                                        color: ["#c1c6ca"]
                                    }
                                }
                            }],
                     series: [{
                                name: '浏览量',
                                type: 'line',
                                stack: '总量',
                                itemStyle: {
                                    normal: {
                                        lineStyle: {
                                            width: 2
                                        }
                                    }
                                    
                                },
                                smooth: true,
                                
                                areaStyle: {
                                    normal: {
                                        opacity: 1,
                                        color: {
                                            x: 0,
                                            y: 0,
                                            x2: 0,
                                            y2: 1,
                                            type: "linear",
                                            global: !1,
                                            colorStops: [{
                                                offset: 0,
                                                color: "#ff5b5b"
                                            }, {
                                                offset: 1,
                                                color: "#f99191"
                                            }]
                                        }
                                    }
                                },
                                data: [{suiranx_nav_views1($article->ID)}, {suiranx_nav_views2($article->ID)}, {suiranx_nav_views3($article->ID)}, {suiranx_nav_views4($article->ID)}, {suiranx_nav_views5($article->ID)}, {suiranx_nav_views6($article->ID)}, {suiranx_nav_views7($article->ID)}, {suiranx_nav_views8($article->ID)}, {suiranx_nav_views9($article->ID)}, {suiranx_nav_views10($article->ID)}, {suiranx_nav_views11($article->ID)}, {suiranx_nav_views12($article->ID)}, {suiranx_nav_views13($article->ID)}, {suiranx_nav_views14($article->ID)}, {suiranx_nav_views15($article->ID)}, {suiranx_nav_views16($article->ID)}, {suiranx_nav_views17($article->ID)}, {suiranx_nav_views18($article->ID)}, {suiranx_nav_views19($article->ID)}, {suiranx_nav_views20($article->ID)}, {suiranx_nav_views21($article->ID)}, {suiranx_nav_views22($article->ID)}, {suiranx_nav_views23($article->ID)}, {suiranx_nav_views24($article->ID)}, {suiranx_nav_views25($article->ID)}, {suiranx_nav_views26($article->ID)}, {suiranx_nav_views27($article->ID)}, {suiranx_nav_views28($article->ID)}, {suiranx_nav_views29($article->ID)}, {suiranx_nav_views30($article->ID)}]
                            }]
                };
                myChart.setOption(option);
            </script> 
        </div>
    </div>
</div>
{/if}