<?php

namespace EMailChef\Command\Api;

use EMailChef\Service\ApiService;

class AddEmailsToGroupCommand
{
    protected $apiService;

    public function __construct($apiService = null)
    {
        $this->apiService = $apiService ?: new ApiService();
    }

    public function execute($headers, $emails, $listId, $groupId)
    {
        $getSegmentCommand = new GetSegmentCommand();
        $currentSegment = $getSegmentCommand->execute($headers, $listId, $groupId);
        $updateSegmentCommand = new UpdateSegmentCommand();
        $conditionGroups = array();
        $conditionGroups['logic'] = 'OR';
        $conditionGroups['conditions'] = array();
        if (isset($currentSegment->condition_groups[0]->conditions)) {
            $conditionGroups['conditions'] = $currentSegment->condition_groups[0]->conditions;
        }
        foreach ($emails as $email) {
            $conditionGroups['conditions'][] = array(
                'field_id' => '-1',
                'name' => 'email',
                'comparable_id' => null,
                'comparator_id' => 1,
                'value' => $email,
            );
        }
        $conditionGroups = array($conditionGroups);
        return $updateSegmentCommand->execute($headers, $listId, $currentSegment->name, $currentSegment->description, 'OR', $conditionGroups, $groupId);
    }
}
