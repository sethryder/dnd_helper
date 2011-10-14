<?php

class Player_model extends CI_Model 
{
    function getCharacter($cid) 
    {
        $this->db->where('cid', $cid);
        $query = $this->db->get('characters');
        
        foreach ($query->result() as $row) 
        {
            $character[] = array(
                'id' => $row->id,
                'cid' => $row->cid,
                'name' => $row->name,
                'level' => $row->level,
                'experience' => $row->experience,
                'gold' => $row->gold,
                'str' => $row->str,
                'dex' => $row->dex,
                'con' => $row->con,
                'int' => $row->int,
                'wis' => $row->wis,
                'cha' => $row->cha,
                'class' => $row->class,
                'alignment' => $row->alignment,
                'race' => $row->race,
                'sex' => $row->sex,
                'height' => $row->height,
                'weight' => $row->weight,
                'age' => $row->age,
                'hair' => $row->hair,
                'eyes' => $row->eyes,
                'apperance' => $row->apperance,
                'perception' => $row->perception,
                'hitpoints' => $row->hitpoints,
                'max_hitpoints' => $row->max_hitpoints,
                'ac' => $row->ac,
                'religion' => $row->religion,
                'birthplace' => $row->birthplace,
                'created' => $row->created,
                'modified' => $row->modified
            );
        }
 
        
        return $character[0];
        
    }
    
    function getBackpack($cid)
    {
        $this->db->where('cid', $cid);
        $query = $this->db->get('backpacks');
        
        foreach ($query->result() as $row)
        {
            $items[] = array(
                'id' => $row->id,
                'cid' => $row->cid,
                'item_name' => $row->item_name,
                'item_count' => $row->item_count,
                'date_added' => $row->date_added,
                'date_modified' => $row->date_modified
                );
        }
        
        return $items;
    }
    
    function addItem($cid, $item, $count)
    {
        $item = array(
            'cid' => $cid,
            'item_name' => $item,
            'item_count' => $count,
            'date_added' => time()
            );
            
        $this->db->insert('backpacks', $item);
    }
    
    function updateItem($item_id, $item_name, $item_count)
    {
        $data = array(
            'item_name' => $item_name,
            'item_count' => $item_count
            );
        
        $this->db->where('id', $item_id);
        $this->db->update('backpacks', $data);
    }
    
    function removeItem($item_id)
    {
        $this->db->where('id', $item_id);
        $this->db->delete('backpacks');
    }

	function getJournal()
	{
		
	}
	
	function updateJournal()
	{
		
	}
    
    function updateCharacter($cid, $stat, $value)
    {
        
    }
    
    function updateQuick($cid, $hp, $exp, $gold)
    {
        $data = array(
               'experience' => $exp,
               'gold' => $gold,
               'hitpoints' => $hp
            );

        $this->db->where('cid', $cid);
        $this->db->update('characters', $data);         
    }

    function logAction($cid, $stat, $value)
    {
        
    }
   
}