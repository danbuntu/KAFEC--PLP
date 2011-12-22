// tell YUI loader to get the charts control and its dependencies
var tablestoYUIchartsplease = new YAHOO.util.YUILoader({
  require: ['charts'],
// if that is done ...
  onSuccess: function(){

// get all tables in the document with the class name "yui-table"
    var tables = YAHOO.util.Dom.getElementsByClassName('yui-table','table');

// and do the following with each of them
    YAHOO.util.Dom.batch(tables,function(o){

// create a new DIV,give it the class "yuichartfromtable" and insert it before the table
      var chartcontainer = document.createElement('div');
      YAHOO.util.Dom.addClass(chartcontainer,'yuichartfromtable');
      YAHOO.util.Dom.insertBefore(chartcontainer,o);

// Read the information stored in the table and set it up as a datasource
      var data = new YAHOO.util.DataSource(o);
      data.responseType = YAHOO.util.DataSource.TYPE_HTMLTABLE;
      data.responseSchema = {fields:['response','count']};

// Tell the script where the charts.swf file resides
      YAHOO.widget.Chart.SWFURL = 'http://developer.yahoo.com/yui/build/charts/assets/charts.swf?_yuiversion=2.4.1';

// create a new Pie
      var chart = new YAHOO.widget.PieChart(chartcontainer,data,{
        categoryField:'response',
        dataField:'count',
        expressInstall:'http://developer.yahoo.com/yui/build/charts/assets/expressinstall.swf'
      });
    });
  }
});
// if the script is called over http (charts don't work on the file system)...
if(document.location.toString().indexOf('http')!==-1){
  tablestoYUIchartsplease.insert();
}