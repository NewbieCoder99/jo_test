jQuery,$.fn.newsticker=function(l){var n=[];return l=$.extend({width:"100%",modul:"newsticker",color:"default",border:!1,effect:"fade",fontstyle:"normal",autoplay:!1,timer:4e3,feed:!1,feedlabels:!1,feedcount:5},l),this.each(function(){l.modul=$("#"+$(this).attr("id"));var i=l.modul,e=0,t=0,d=l.modul.find("ul li").length,o=!0;function u(){l.modul.width()<480?(l.modul.find(".bn-title h2").css({display:"none"}),l.modul.find(".bn-title").css({width:10}),l.modul.find("ul").css({left:30})):(l.modul.find(".bn-title h2").css({display:"inline-block"}),l.modul.find(".bn-title").css({width:"auto"}),l.modul.find("ul").css({left:$(l.modul).find(".bn-title").width()+30}))}function a(){++e==d&&(e=0),f()}function f(){"fade"==l.effect?(l.modul.find("ul li").css({display:"none"}),l.modul.find("ul li").eq(e).fadeIn("normal",function(){o=!0})):"slide-h"==l.effect?l.modul.find("ul li").eq(t).animate({width:0},function(){$(this).css({display:"none",width:"100%"}),l.modul.find("ul li").eq(e).css({width:0,display:"block"}),l.modul.find("ul li").eq(e).animate({width:"100%"},function(){o=!0,t=e})}):"slide-v"==l.effect&&(t<=e?(l.modul.find("ul li").eq(t).animate({top:-60}),l.modul.find("ul li").eq(e).css({top:60,display:"block"}),l.modul.find("ul li").eq(e).animate({top:0},function(){t=e,o=!0})):(l.modul.find("ul li").eq(t).animate({top:60}),l.modul.find("ul li").eq(e).css({top:-60,display:"block"}),l.modul.find("ul li").eq(e).animate({top:0},function(){t=e,o=!0})))}function s(l,n,i){(i=new XMLHttpRequest).open("GET",l),i.onload=n,i.send()}0!=l.feed?function(){for(n=l.feed.split(","),l.feedlabels.split(","),d=0,l.modul.find("ul").html(""),xx=0,k=0;k<n.length;k++)s((i=n[k].trim(),"http://query.yahooapis.com/v1/public/yql?q="+encodeURIComponent('select * from rss where url="'+i+'" limit '+l.feedcount)+"&format=json"),function(){var n=JSON.parse(this.response);n=n.query.results.item,$(n).each(function(i,e){d++,dataLink=$("<a>").prop("href",n[i].link).prop("hostname"),l.modul.find("ul").append('<li><a target="_blank" href="'+n[i].link+'"><span>'+dataLink+"</span> - "+n[i].title+"</a></li>"),0==xx&&l.modul.find("ul li").eq(0).fadeIn(),xx++})});var i}():l.modul.find("ul li").eq(e).fadeIn(),u(),l.autoplay?(i=setInterval(function(){a()},l.timer),$(l.modul).on("mouseenter",function(){clearInterval(i)}),$(l.modul).on("mouseleave",function(){i=setInterval(function(){a()},l.timer)})):clearInterval(i),l.border||l.modul.addClass("bn-bordernone"),"italic"==l.fontstyle&&l.modul.addClass("bn-italic"),"bold"==l.fontstyle&&l.modul.addClass("bn-bold"),"bold-italic"==l.fontstyle&&l.modul.addClass("bn-bold bn-italic"),l.modul.addClass("bn-"+l.color),$(window).on("resize",function(){u()}),l.modul.find(".bn-navi span").on("click",function(){o&&(o=!1,0==$(this).index()?(--e<0&&(e=d-1),f()):(++e==d&&(e=0),f()))})})};