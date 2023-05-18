<?php
namespace Models;

use \Models\Database;

class NotificationModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  /**
   * GET BY USER ID
   * @return array
   */
  public function getByUser($user_id): array
  {
    $this->db->query("SELECT n.notification_id,
                                 n_o.date_created,
                                 n_e_t.action_type,
                                 t.ticket_id, t.title,
                                 u.first_name, u.last_name
                          FROM notification n
                          INNER JOIN notification_object n_o
                            ON n.notification_object_id = n_o.notification_object_id
                          INNER JOIN notification_change n_c
                            ON n.notification_object_id = n_c.notification_object_id
                          INNER JOIN notification_entity_type n_e_t
                            ON n_o.notification_entity_type_id = n_e_t.notification_entity_type_id
                          INNER JOIN ticket t
                            ON n_o.entity_id = t.ticket_id
                          INNER JOIN user u
                            ON n_c.actor_id = u.user_id
                          WHERE n.notifier_id = :user_id
                          ORDER BY n_o.date_created DESC"
    );
    $this->db->bind(":user_id", $user_id);
    return $this->db->resultSet();
  }

  /**
   * GET BY TICKET ID
   * @return array
   */
  public function getByTicket($ticket_id)
  {
    $this->db->query("SELECT n_o.notification_object_id, n_o.date_created,
                             n_e_t.action_type,
                             u.user_id, u.first_name, u.last_name
                        FROM notification_object n_o
                        INNER JOIN notification_change n_c
                          ON n_o.notification_object_id = n_c.notification_object_id
                        INNER JOIN notification_entity_type n_e_t
                          ON n_e_t.notification_entity_type_id = n_o.notification_entity_type_id
                        INNER JOIN user u
                          ON n_c.actor_id = u.user_id
                        WHERE n_o.entity_id = :entity_id
                        ORDER BY n_o.notification_object_id ASC"
    );
    $this->db->bind(":entity_id", $ticket_id);
    return $this->db->resultSet();
  }

  /**
   * CREATE
   * @return bool
   */
  public function createOne($notification_object_id, $notifier_id): bool
  {
    $this->db->query("INSERT INTO notification (`notification_object_id`, `notifier_id`) VALUES (:notification_object_id, :notifier_id)");
    $this->db->bind(":notification_object_id", $notification_object_id);
    $this->db->bind(":notifier_id", $notifier_id);
    if ($this->db->execute())
      return true;
    return false;
  }
}