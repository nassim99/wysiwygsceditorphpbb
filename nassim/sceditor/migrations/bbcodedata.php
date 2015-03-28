<?php
/**
*
* @package Referrers
* @copyright (c) 2014 ForumHulp.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace nassim\sceditor\migrations;

class bbcodedata extends \phpbb\db\migration\migration
{

	public function update_data()
	{
		return array(
			        array('custom', array(array($this, 'addbbcode'))),
		);
	}

	public function revert_data()
	{
    	return array(
    			    array('custom', array(array($this, 'removebbcode'))),
		);
	}

    public function removebbcode()
    {




    	$bbcodedata = array('li','ul','s','sub','sup','left','right','center','justify','font=','ol','table','td','tr','hr','youtube','rtl','ltr',);

        $sqsl = 'DELETE FROM ' . $this->table_prefix . 'bbcodes WHERE ' . $this->db->sql_in_set('bbcode_tag', $bbcodedata);
        $this->db->sql_query($sqsl);



    }

    public function addbbcode()
    {
        $bbcodedata = array('li','ul','s','sub','sup','left','right','center','justify','font=','ol','table','td','tr','hr','youtube','rtl','ltr',);

        $sqsl = 'DELETE FROM ' . $this->table_prefix . 'bbcodes WHERE ' . $this->db->sql_in_set('bbcode_tag', $bbcodedata);
        $this->db->sql_query($sqsl);

        $sql = 'SELECT bbcode_id
    				FROM ' . $this->table_prefix . 'bbcodes
    				 ORDER BY bbcode_id DESC LIMIT 1'
    				 ;
    		$result = $this->db->sql_query($sql);
    		while ($styles_row = $this->db->sql_fetchrow())
    		{
    				$style_ids = $styles_row['bbcode_id'];
    			
    		}
    		$this->db->sql_freeresult($result);
        if (!isset($style_ids)) { 
            $style_ids = '0';
    	}

        $phpbb_bbcodes = array(
        	array( // row #1
        		'bbcode_id' => $style_ids + 1,
        		'bbcode_tag' => 'li',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[li]{TEXT}[/li]',
        		'bbcode_tpl' => '<li>{TEXT}</li>',
        		'first_pass_match' => '!\\[li\\](.*?)\\[/li\\]!ies',
        		'first_pass_replace' => '\'[li:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/li:$uid]\'',
        		'second_pass_match' => '!\\[li:$uid\\](.*?)\\[/li:$uid\\]!s',
        		'second_pass_replace' => '<li>${1}</li>',
        	),
        	array( // row #2
        		'bbcode_id' => $style_ids + 2,
        		'bbcode_tag' => 'ul',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[ul]{TEXT}[/ul]',
        		'bbcode_tpl' => '<ul>{TEXT}</ul>',
        		'first_pass_match' => '!\\[ul\\](.*?)\\[/ul\\]!ies',
        		'first_pass_replace' => '\'[ul:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/ul:$uid]\'',
        		'second_pass_match' => '!\\[ul:$uid\\](.*?)\\[/ul:$uid\\]!s',
        		'second_pass_replace' => '<ul>${1}</ul>',
        	),
        	array( // row #3
        		'bbcode_id' => $style_ids + 3,
        		'bbcode_tag' => 's',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[s]{TEXT}[/s]',
        		'bbcode_tpl' => '<strike>{TEXT}</strike>',
        		'first_pass_match' => '!\\[s\\](.*?)\\[/s\\]!ies',
        		'first_pass_replace' => '\'[s:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/s:$uid]\'',
        		'second_pass_match' => '!\\[s:$uid\\](.*?)\\[/s:$uid\\]!s',
        		'second_pass_replace' => '<strike>${1}</strike>',
        	),
        	array( // row #4
        		'bbcode_id' => $style_ids + 4,
        		'bbcode_tag' => 'sub',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[sub]{TEXT}[/sub]',
        		'bbcode_tpl' => '<style>\nsub {\n    vertical-align: sub;\n    font-size: smaller;\n} \n</style>\n<sub>{TEXT}</sub>',
        		'first_pass_match' => '!\\[sub\\](.*?)\\[/sub\\]!ies',
        		'first_pass_replace' => '\'[sub:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/sub:$uid]\'',
        		'second_pass_match' => '!\\[sub:$uid\\](.*?)\\[/sub:$uid\\]!s',
        		'second_pass_replace' => '<style>\nsub {\n    vertical-align: sub;\n    font-size: smaller;\n} \n</style>\n<sub>${1}</sub>',
        	),
        	array( // row #5
        		'bbcode_id' => $style_ids + 5,
        		'bbcode_tag' => 'sup',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[sup]{TEXT}[/sup]',
        		'bbcode_tpl' => '<style>\nsup {\n    vertical-align: super;\n    font-size: smaller;\n} \n</style>\n<sup>{TEXT}</sup>',
        		'first_pass_match' => '!\\[sup\\](.*?)\\[/sup\\]!ies',
        		'first_pass_replace' => '\'[sup:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/sup:$uid]\'',
        		'second_pass_match' => '!\\[sup:$uid\\](.*?)\\[/sup:$uid\\]!s',
        		'second_pass_replace' => '<style>\nsup {\n    vertical-align: super;\n    font-size: smaller;\n} \n</style>\n<sup>${1}</sup>',
        	),
        	array( // row #6
        		'bbcode_id' => $style_ids + 6,
        		'bbcode_tag' => 'left',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[left]{TEXT}[/left]',
        		'bbcode_tpl' => '<div align="left">{TEXT}</div>',
        		'first_pass_match' => '!\\[left\\](.*?)\\[/left\\]!ies',
        		'first_pass_replace' => '\'[left:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/left:$uid]\'',
        		'second_pass_match' => '!\\[left:$uid\\](.*?)\\[/left:$uid\\]!s',
        		'second_pass_replace' => '<div align="left">${1}</div>',
        	),
        	array( // row #7
        		'bbcode_id' => $style_ids + 7,
        		'bbcode_tag' => 'right',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[right]{TEXT}[/right]',
        		'bbcode_tpl' => '<div align="right">{TEXT}</div>',
        		'first_pass_match' => '!\\[right\\](.*?)\\[/right\\]!ies',
        		'first_pass_replace' => '\'[right:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/right:$uid]\'',
        		'second_pass_match' => '!\\[right:$uid\\](.*?)\\[/right:$uid\\]!s',
        		'second_pass_replace' => '<div align="right">${1}</div>',
        	),
        	array( // row #8
        		'bbcode_id' => $style_ids + 8,
        		'bbcode_tag' => 'center',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[center]{TEXT}[/center]',
        		'bbcode_tpl' => '<div align="center">{TEXT}</div>',
        		'first_pass_match' => '!\\[center\\](.*?)\\[/center\\]!ies',
        		'first_pass_replace' => '\'[center:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/center:$uid]\'',
        		'second_pass_match' => '!\\[center:$uid\\](.*?)\\[/center:$uid\\]!s',
        		'second_pass_replace' => '<div align="center">${1}</div>',
        	),
        	array( // row #9
        		'bbcode_id' => $style_ids + 9,
        		'bbcode_tag' => 'justify',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[justify]{TEXT}[/justify]',
        		'bbcode_tpl' => '<div align="justify">{TEXT}</div>',
        		'first_pass_match' => '!\\[justify\\](.*?)\\[/justify\\]!ies',
        		'first_pass_replace' => '\'[justify:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/justify:$uid]\'',
        		'second_pass_match' => '!\\[justify:$uid\\](.*?)\\[/justify:$uid\\]!s',
        		'second_pass_replace' => '<div align="justify">${1}</div>',
        	),
        	array( // row #10
        		'bbcode_id' => $style_ids + 10,
        		'bbcode_tag' => 'font=',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[font={SIMPLETEXT}]{TEXT}[/font]',
        		'bbcode_tpl' => '<font face="{SIMPLETEXT}">{TEXT}</font>',
        		'first_pass_match' => '!\\[font\\=([a-zA-Z0-9-+.,_ ]+)\\](.*?)\\[/font\\]!ies',
        		'first_pass_replace' => '\'[font=${1}:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${2}\')).\'[/font:$uid]\'',
        		'second_pass_match' => '!\\[font\\=([a-zA-Z0-9-+.,_ ]+):$uid\\](.*?)\\[/font:$uid\\]!s',
        		'second_pass_replace' => '<font face="${1}">${2}</font>',
        	),
        	array( // row #11
        		'bbcode_id' => $style_ids + 11,
        		'bbcode_tag' => 'ol',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[ol]{TEXT}[/ol]',
        		'bbcode_tpl' => '<ol>{TEXT}</ol>',
        		'first_pass_match' => '!\\[ol\\](.*?)\\[/ol\\]!ies',
        		'first_pass_replace' => '\'[ol:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/ol:$uid]\'',
        		'second_pass_match' => '!\\[ol:$uid\\](.*?)\\[/ol:$uid\\]!s',
        		'second_pass_replace' => '<ol>${1}</ol>',
        	),
        	array( // row #12
        		'bbcode_id' => $style_ids + 12,
        		'bbcode_tag' => 'table',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[table]{TEXT}[/table]',
        		'bbcode_tpl' => '<table>\n<tbody>\n{TEXT}\n</tbody>\n</table>',
        		'first_pass_match' => '!\\[table\\](.*?)\\[/table\\]!ies',
        		'first_pass_replace' => '\'[table:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/table:$uid]\'',
        		'second_pass_match' => '!\\[table:$uid\\](.*?)\\[/table:$uid\\]!s',
        		'second_pass_replace' => '<table>\n<tbody>\n${1}\n</tbody>\n</table>',
        	),
        	array( // row #13
        		'bbcode_id' => $style_ids + 13,
        		'bbcode_tag' => 'td',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[td]{TEXT}[/td]',
        		'bbcode_tpl' => '<style>\ntd {border: 1px dotted #000;}\n</style>\n<td>{TEXT}</td>',
        		'first_pass_match' => '!\\[td\\](.*?)\\[/td\\]!ies',
        		'first_pass_replace' => '\'[td:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/td:$uid]\'',
        		'second_pass_match' => '!\\[td:$uid\\](.*?)\\[/td:$uid\\]!s',
        		'second_pass_replace' => '<style>\ntd {border: 1px dotted #000;}\n</style>\n<td>${1}</td>',
        	),
        	array( // row #14
        		'bbcode_id' => $style_ids + 14,
        		'bbcode_tag' => 'tr',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[tr]{TEXT}[/tr]',
        		'bbcode_tpl' => '<tr>{TEXT}</tr>',
        		'first_pass_match' => '!\\[tr\\](.*?)\\[/tr\\]!ies',
        		'first_pass_replace' => '\'[tr:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/tr:$uid]\'',
        		'second_pass_match' => '!\\[tr:$uid\\](.*?)\\[/tr:$uid\\]!s',
        		'second_pass_replace' => '<tr>${1}</tr>',
        	),
        	array( // row #15
        		'bbcode_id' => $style_ids + 15,
        		'bbcode_tag' => 'hr',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[hr][/hr]',
        		'bbcode_tpl' => '<hr />',
        		'first_pass_match' => '!\\[hr\\]\\[/hr\\]!i',
        		'first_pass_replace' => '[hr:$uid][/hr:$uid]',
        		'second_pass_match' => '[hr:$uid][/hr:$uid]',
        		'second_pass_replace' => '',
        	),
        	array( // row #16
        		'bbcode_id' => $style_ids + 16,
        		'bbcode_tag' => 'youtube',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[youtube]{SIMPLETEXT}[/youtube]',
        		'bbcode_tpl' => '<iframe width="560" height="315" src="http://www.youtube.com/embed/{SIMPLETEXT}?wmode=opaque" data-youtube-id="{SIMPLETEXT}" frameborder="0" allowfullscreen></iframe>',
        		'first_pass_match' => '!\\[youtube\\]([a-zA-Z0-9-+.,_ ]+)\\[/youtube\\]!i',
        		'first_pass_replace' => '[youtube:$uid]${1}[/youtube:$uid]',
        		'second_pass_match' => '!\\[youtube:$uid\\]([a-zA-Z0-9-+.,_ ]+)\\[/youtube:$uid\\]!s',
        		'second_pass_replace' => '<iframe width="560" height="315" src="http://www.youtube.com/embed/${1}?wmode=opaque" data-youtube-id="${1}" frameborder="0" allowfullscreen></iframe>',
        	),
        	array( // row #17
        		'bbcode_id' => $style_ids + 17,
        		'bbcode_tag' => 'rtl',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[rtl]{TEXT}[/rtl]',
        		'bbcode_tpl' => '<div style="direction: rtl;">{TEXT}</div>',
        		'first_pass_match' => '!\\[rtl\\](.*?)\\[/rtl\\]!ies',
        		'first_pass_replace' => '\'[rtl:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/rtl:$uid]\'',
        		'second_pass_match' => '!\\[rtl:$uid\\](.*?)\\[/rtl:$uid\\]!s',
        		'second_pass_replace' => '<div style="direction: rtl;">${1}</div>',
        	),
        	array( // row #18
        		'bbcode_id' => $style_ids + 18,
        		'bbcode_tag' => 'ltr',
        		'bbcode_helpline' => '',
        		'display_on_posting' => 0,
        		'bbcode_match' => '[ltr]{TEXT}[/ltr]',
        		'bbcode_tpl' => '<div style="direction: ltr;">{TEXT}</div>',
        		'first_pass_match' => '!\\[ltr\\](.*?)\\[/ltr\\]!ies',
        		'first_pass_replace' => '\'[ltr:$uid]\'.str_replace(array("\\r\\n", \'\\"\', \'\\\'\', \'(\', \')\'), array("\\n", \'"\', \'&#39;\', \'&#40;\', \'&#41;\'), trim(\'${1}\')).\'[/ltr:$uid]\'',
        		'second_pass_match' => '!\\[ltr:$uid\\](.*?)\\[/ltr:$uid\\]!s',
        		'second_pass_replace' => '<div style="direction: ltr;">${1}</div>',
        	),
        );
    	foreach ($phpbb_bbcodes as $eee)
    	{

    		$sql = 'INSERT INTO ' . $this->table_prefix . 'bbcodes' . $this->db->sql_build_array('INSERT', $eee);
    		$this->db->sql_query($sql);
    	}

    }

}