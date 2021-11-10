$(document).ready(function () {
    hopscotch.startTour({
        id: "my-intro",
        steps: [{
            target: "myChart",
            title: "Total amount in local currency",
            content: "Sum of all you CASA(s)",
            placement: "bottom",
            yOffset: 2
        }, {
            target: "currency_rates_tour",
            title: "Display Text",
            content: "Click on the button and make sidebar navigation small.",
            placement: "bottom",
            zindex: 9999
        }, {
            target: "currency_converter_tour",
            title: "User settings",
            content: "You can edit you profile info here.",
            placement: "left",
            zindex: 999
        }, {
            target: "headingOne",
            title: "Thank you !",
            content: "Here you can change theme skins and other features.",
            placement: "top",
            zindex: 999
        }, {
            target: "headingTwo",
            title: "Thank you !",
            content: "Here you can change theme skins and other features.",
            placement: "top",
            zindex: 999
        }],
        showPrevButton: !0
    })
});
