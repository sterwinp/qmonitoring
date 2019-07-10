$(document).ready(function()
{
	$(".nano").nanoScroller();
	var query_in = $.parseJSON(query);
	console.log(query_in)
	runQuery();
	function runQuery()
	{
		if( !$.isEmptyObject( query_in ) )
		{
			$.each(query_in,function(q_key,q_val)
			{
				setInterval(function()
				{
					getresult(q_val['id'],q_val['query'])
				},q_val['period']);
			});
		}
	}

	function getresult( id,run_query )
	{
		$.ajax(
		{
			url: base_url+'home/getresult',
			data:{query_id:id},
			type:'POST',
			dataType:'json',
			success:function(result)
			{
				console.log(result)
				if( result['code'] == 0 )
				{
					window.location.href = base_url;
				}
				else if( result['code'] == 1  )
				{
					var color = '#bbb';
					if( result['data']['status'] == 1 )
					{
						color = 'green';
					}
					else
					{
						color = 'red';
					}
					$('#qstatus_'+result['data']['id']).children('.dot').css('background',color);
					$('#qstatus_'+result['data']['id']).children('.timeago').html(result['data']['date']);
					// $('#qresult_'+result['data']['id']).find('.qres-ul').prepend(result['data']['result']);
					var text = result['data']['result'].replace(/"/g, "'");
					$('#qresult_'+result['data']['id']).find('.qres-ul').prepend('<li><a class="qresult-link" data-qresult="'+text+'" href="#">'+result['data']['date']+'</li>');
				}
				else
				{

				}
			}
		});
	}

	$('body').on('click','.qresult-link',function()
	{
		var qres = $(this).data('qresult');
		$('.qresult-preview').html(qres);
		$('#preview').modal('show');
	});
});