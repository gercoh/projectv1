<?php

namespace administration\models\parts;

use PDO;

/**
 * Class Skills
 * @package administration\models\parts
 */
class Skills extends \application\models\parts\Skills
{
    /**
     * @param int $skillId
     * @param array $data
     * @return bool
     */
    public function updateSkill($skillId, array $data)
    {
        $query = $this
            ->getConnection()
            ->prepare('UPDATE skills SET data = :skillName, level = :level WHERE id = :skillId');

        $query->bindParam(':skillName', $data['data']);
        $query->bindParam(':level', $data['level']);
        $query->bindParam(':skillId', $skillId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param int $skillId
     * @return bool
     */
    public function deleteSkill($skillId)
    {
        $query = $this->getConnection()->prepare('DELETE FROM skills WHERE id = :skillId LIMIT 1');
        $query->bindParam(':skillId', $skillId, PDO::PARAM_INT);

        return $query->execute();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function createSkill(array $data)
    {
        $query = $this->getConnection()->prepare('INSERT INTO skills (data, level) VALUES (:data, :level)');
        $query->bindParam(':data', $data['data']);
        $query->bindParam(':level', $data['level'], PDO::PARAM_INT);

        return $query->execute();
    }
}
