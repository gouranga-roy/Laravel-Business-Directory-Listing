/*
 Theme Name: Onlinedu
 Theme URI:
 Author:
 Author URI:
 Description: Onlinedu Responsive HTML5 Template
 Version: 1.0
 License:
 License URI:
*/

/*==================================
   [Table of contents]
===================================
   01. Variables
   02. Nice Selects

*/

(function () {
    'use strict';
    /*------------------------------------------------------
    /  01. Variables
    /------------------------------------------------------*/

    var $niceSelect = $('.nice-control');
    var $elements = $('.choice-select');
    var $customSelectTo = $('.custom-selectTo');
    var $summernote = $('.summernote');
    var $editor = $('.editor');
    var $iconPicker = $('.icon-picker');

    // Nice Select
    if ($niceSelect.length > 0) {
        $niceSelect.each(function () {
            $(this).niceSelect();
        });
    }

    // Choice Select
    if ($elements.length > 0) {
        $elements.each(function () {
            const $this = $(this);

            // Placeholder set
            $this.attr('placeholder', 'Select options...');

            // Choices init for each select
            new Choices(this, {
                removeItemButton: true,
                searchEnabled: true,
                placeholderValue: 'Select options...',
                noResultsText: 'No results found',
                itemSelectText: '',
                shouldSort: false,
                allowHTML: false,
                duplicateItemsAllowed: false,
            });
        });
    }

    // Custom Select To
    if ($customSelectTo.length > 0) {
        $customSelectTo.each(function () {
            $(this).select2({
                dropdownParent: $('#modal .modal-content')
            });
        });
    }

    //Summernote Editor
    if ($summernote.length > 0) {
        $summernote.each(function () {
            $(this).summernote({
                height: 120,
                minHeight: null,
                maxHeight: null,
                focus: false,
                placeholder: 'Website title',
            });
        });
    }

    // Text Editor
    if ($editor.length > 0) {
        $editor.each(function (index) {
            new Quill(this, {
                theme: 'snow',
                modules: {
                    toolbar: true
                }
            });
        });
    }

    // Sidebar Toggle
    const sideToggle = $(".sidebar_toggle");
    const sideMenu = $(".sidebar");
    const sidebarWrapper = $(".sidebar-wrapper");
    const sidebarOverlay = $(".sidebar-overlay");
    const mainHeader = $(".main-header");

    if (sideToggle.length) {
        sideToggle.on("click", function (event) {
            event.stopPropagation();
            sidebarWrapper.toggleClass("open");
            sideMenu.toggleClass("sidebar_small");
            sideToggle.toggleClass("active");
            sidebarOverlay.toggleClass("active");
            mainHeader.toggleClass("active");
        });

        // Close menu when overlay is clicked
        sidebarOverlay.on("click", function () {
            sidebarWrapper.removeClass("open");
            sideMenu.removeClass("sidebar_small");
            sideToggle.removeClass("active");
            sidebarOverlay.removeClass("active");
            mainHeader.removeClass("active");
        });
    }


    // Table Rows Selected Items
    document.addEventListener("change", function (event) {
        if (event.target.matches("table thead input.selectAll")) {
            const table = event.target.closest("table");
            const isChecked = event.target.checked;
            const rowChecks = table.querySelectorAll("tbody input.rowCheckbox");
            rowChecks.forEach(cb => cb.checked = isChecked);
            updateSelectionBar(table);
        }
    });

    document.addEventListener("change", function (event) {
        if (event.target.matches("table tbody input.rowCheckbox")) {
            const table = event.target.closest("table");
            const rowChecks = table.querySelectorAll("tbody input.rowCheckbox");
            const checked = table.querySelectorAll("tbody input.rowCheckbox:checked").length;
            const headerCheck = table.querySelector("thead input.selectAll");

            if (headerCheck) {
                headerCheck.checked = (rowChecks.length > 0 && checked === rowChecks.length);
                headerCheck.indeterminate = (checked > 0 && checked < rowChecks.length);
            }
            updateSelectionBar(table);
        }
    });

    // Function to update count bar
    function updateSelectionBar(table) {
        const barWrappers = document.querySelectorAll(".pagination-action-wraper");
        const wrapper = table.closest(".pagination-action-wraper") || document;
        const selectedBar = wrapper.querySelector(".selected-item");
        const total = table.querySelectorAll("tbody input.rowCheckbox").length;
        const checked = table.querySelectorAll("tbody input.rowCheckbox:checked").length;

        if (!selectedBar) return;

        const checkedCount = selectedBar.querySelector(".checked-count");
        const totalCount = selectedBar.querySelector(".total-count");

        // Update counts
        checkedCount.textContent = checked;
        totalCount.textContent = total;

        // Show/hide bar for all wrappers
        barWrappers.forEach(bar => {
            if (checked > 0) {
                bar.classList.add("active");
            } else {
                bar.classList.remove("active");
            }
        });
        document.querySelectorAll(".selected-item").forEach(bar => (bar.style.display = "block"));
    }

    // Clear all selections
    document.addEventListener("click", function (event) {
        if (event.target.closest(".clear-selection")) {
            document.querySelectorAll("table tbody input.rowCheckbox").forEach(cb => cb.checked = false);
            document.querySelectorAll("table thead input.selectAll").forEach(cb => {
                cb.checked = false;
                cb.indeterminate = false;
            });
            document.querySelectorAll(".selected-item").forEach(bar => (bar.style.display = "none"));

            const barWrappers = document.querySelectorAll(".pagination-action-wraper");
            barWrappers.forEach(bar => {
                bar.classList.remove("active");
            });
        }
    });


    // Bootstrap Tooltip
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    // Sidebar Dropdown Menu
    $('.navbar-content li.subMenu_dropdown > a').on('click', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $this = $(this);
        var $parentLi = $this.parent();
        var $submenu = $this.siblings('ul');

        $parentLi.siblings('.subMenu_dropdown')
            .removeClass('childShow')
            .find('ul').slideUp();

        $parentLi.siblings('.subMenu_dropdown')
            .find('> a').removeClass('active');

        $submenu.stop(true, true).slideToggle();
        $this.toggleClass('active');
        $parentLi.toggleClass('childShow');

    });

    // Sidebar dropdown menu hover
    $('.sidebar.sidebar_small .navbar-content li.subMenu_dropdown').hover(
        function () {
            var $this = $(this);
            var $submenu = $this.children('ul');

            // close others
            $this.siblings('.subMenu_dropdown')
                .removeClass('childShow')
                .find('ul').stop(true, true).slideUp();

            $this.siblings('.subMenu_dropdown')
                .find('> a').removeClass('active');

            // open current
            $this.addClass('childShow');
            $this.children('a').addClass('active');
            $submenu.stop(true, true).slideDown();
        },
        function () {
            var $this = $(this);
            $this.removeClass('childShow');
            $this.children('a').removeClass('active');
            $this.children('ul').stop(true, true).slideUp();
        }
    );


    $(document).on('click', function () {
        $('.subMenu_dropdown').removeClass('childShow');
        $('.subMenu_dropdown > ul').slideUp();
        $('.subMenu_dropdown > a').removeClass('active');
    });

    $('.subMenu_dropdown ul').on('click', function (e) {
        e.stopPropagation();
    });


    // Scrollbar
    // new SimpleBar(document.getElementById('navbar'), { autoHide: true });

    // Range Slider
    // var slider = new Slider('#range1', {
    //     id: 'range',
    //     tooltip: 'always',
    //     min: 0,
    //     max: 100,
    //     value: 40,
    //     formatter: function (value) {
    //         if (Array.isArray(value)) {
    //             return value[0] + '% - ' + value[1] + '%';
    //         }
    //         return value + '%';
    //     }
    // });

    // var slider = new Slider('#range2', {
    //     id: 'range',
    //     tooltip: 'always',
    //     min: 0,
    //     max: 100,
    //     value: 65,
    //     formatter: function (value) {
    //         if (Array.isArray(value)) {
    //             return value[0] + '% - ' + value[1] + '%';
    //         }
    //         return value + '%';
    //     }
    // });

    // var slider = new Slider('#range3', {
    //     id: 'range',
    //     tooltip: 'always',
    //     min: 0,
    //     max: 100,
    //     value: 20,
    //     formatter: function (value) {
    //         if (Array.isArray(value)) {
    //             return value[0] + '% - ' + value[1] + '%';
    //         }
    //         return value + '%';
    //     }
    // });

    // var slider = new Slider('#range4', {
    //     id: 'range',
    //     tooltip: 'always',
    //     min: 0,
    //     max: 100,
    //     value: 32,
    //     formatter: function (value) {
    //         if (Array.isArray(value)) {
    //             return value[0] + '% - ' + value[1] + '%';
    //         }
    //         return value + '%';
    //     }
    // });


    function initSlider(selector, value) {
        if (!$(selector).length) return;

        new Slider(selector, {
            id: 'range',
            tooltip: 'always',
            min: 0,
            max: 100,
            value: value,
            formatter: function (val) {
                if (Array.isArray(val)) {
                    return val[0] + '% - ' + val[1] + '%';
                }
                return val + '%';
            }
        });
    }

    initSlider('#range1', 40);
    initSlider('#range2', 65);
    initSlider('#range3', 20);
    initSlider('#range4', 32);


    // Sales Chart
    var income = [550, 220, 400, 700, 220, 500, 780, 500, 600, 180, 450, 150];
    var expense = [600, 1200, 0, 300, 620, 1200, 0, 200, 250, 320, 0, 360];

    var options = {
        series: [
            { name: 'Income', data: income },
            { name: 'Expense', data: expense }
        ],
        chart: {
            type: 'bar',
            height: 220,
            stacked: true,
            toolbar: { show: false }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '36%',
                borderRadius: 6,
            }
        },
        colors: ['#ff8a00', '#fff0e6'],
        dataLabels: { enabled: false },
        stroke: {
            show: true,
            width: 1,
            colors: ['#fff1ea', '#0E0F14']
        },

        stroke: {
            show: true,
            width: 1,
            colors: ['#FF8926 ', '#FFEAD8']
        },

        fill: { opacity: 1 },
        dataLabels: { enabled: false },
        grid: {
            show: true,
            borderColor: '#E0E0E0',
            strokeDashArray: 6,
            padding: { left: 0, right: 6, top: 0, bottom: 0 }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            axisBorder: { show: false },
            axisTicks: { show: false },
            labels: {
                style: { colors: '#747C7C', fontSize: '12px' }
            }
        },
        yaxis: {
            max: 2000,
            tickAmount: 5,
            labels: {
                style: { colors: '#747C7C', fontSize: '12px' },
                formatter: function (val) {
                    var labels = ['$0', '$200', '$500', '$1000', '$1500', '$2000'];
                    var step = 2000 / (labels.length - 1);
                    var idx = Math.round(val / step);
                    if (labels[idx] !== undefined) return labels[idx];
                    return '$' + val;
                }
            }
        },
        states: {
            hover: { filter: { type: 'none' } },
            active: { allowMultipleDataPointsSelection: false, filter: { type: 'none' } }
        },
        tooltip: {
            shared: true,
            intersect: false,
            x: {
                formatter: function (val) {
                    var map = {
                        'Jan': 'January 2029', 'Feb': 'February 2029', 'Mar': 'March 2029',
                        'Apr': 'April 2029', 'May': 'May 2029', 'Jun': 'June 2029',
                        'Jul': 'July 2029', 'Aug': 'August 2029', 'Sep': 'September 2029',
                        'Oct': 'October 2029', 'Nov': 'November 2029', 'Dec': 'December 2029'
                    };
                    return map[val] || val;
                }
            },
            y: {
                formatter: function (val) {
                    return '$' + Number(val).toLocaleString();
                }
            },
            style: {
                fontSize: '12px'
            }
        },
        legend: { show: false }
    };

    var chart = new ApexCharts(document.querySelector("#salesChart"), options);
    chart.render();

    // Sales Chart 02
    var income = [550, 220, 400, 700, 220, 500, 780, 500, 600, 180, 450, 150];
    var expense = [600, 1200, 0, 300, 620, 1200, 0, 200, 250, 320, 0, 360];

    var options = {
        series: [
            { name: 'Income', data: income },
            { name: 'Expense', data: expense }
        ],
        chart: {
            type: 'bar',
            height: 220,
            stacked: true,
            toolbar: { show: false }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '36%',
                borderRadius: 6,
                // borderRadiusApplication: 'last',
                // borderRadiusWhenStacked: 'end',
            }
        },
        colors: ['#12141B', '#F2F4F5'],
        dataLabels: { enabled: false },
        stroke: {
            show: true,
            width: 1,
            colors: ['#F2F4F5', '#0E0F14']
        },

        stroke: {
            show: true,
            width: 1,
            colors: ['#12141B ', '#E0E0E0']
        },

        fill: { opacity: 1 },
        dataLabels: { enabled: false },
        grid: {
            show: true,
            borderColor: '#E0E0E0',
            strokeDashArray: 6,
            padding: { left: 0, right: 6, top: 0, bottom: 0 }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            axisBorder: { show: false },
            axisTicks: { show: false },
            labels: {
                style: { colors: '#747C7C', fontSize: '12px' }
            }
        },
        yaxis: {
            max: 2000,
            tickAmount: 5,
            labels: {
                style: { colors: '#747C7C', fontSize: '12px' },
                formatter: function (val) {
                    var labels = ['$0', '$200', '$500', '$1000', '$1500', '$2000'];
                    var step = 2000 / (labels.length - 1);
                    var idx = Math.round(val / step);
                    if (labels[idx] !== undefined) return labels[idx];
                    return '$' + val;
                }
            }
        },
        states: {
            hover: { filter: { type: 'none' } },
            active: { allowMultipleDataPointsSelection: false, filter: { type: 'none' } }
        },
        tooltip: {
            shared: true,
            intersect: false,
            x: {
                formatter: function (val) {
                    var map = {
                        'Jan': 'January 2029', 'Feb': 'February 2029', 'Mar': 'March 2029',
                        'Apr': 'April 2029', 'May': 'May 2029', 'Jun': 'June 2029',
                        'Jul': 'July 2029', 'Aug': 'August 2029', 'Sep': 'September 2029',
                        'Oct': 'October 2029', 'Nov': 'November 2029', 'Dec': 'December 2029'
                    };
                    return map[val] || val;
                }
            },
            y: {
                formatter: function (val) {
                    return '$' + Number(val).toLocaleString();
                }
            },
            style: {
                fontSize: '12px'
            }
        },
        legend: { show: false }
    };

    var chart = new ApexCharts(document.querySelector("#salesChart02"), options);
    chart.render();


})(jQuery)
