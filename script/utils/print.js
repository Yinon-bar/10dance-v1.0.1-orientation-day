import { getAllStudents } from "./students.js";

export const getAttendeeFromDB = async (t_z_id) => {
  try {
    const attendees = await getAllStudents();
    console.log(attendees);
    console.log(t_z_id);
    const atteendee = attendees.find((attendee) => attendee.t_z_id == t_z_id);
    // console.log(atteendee);
    return atteendee;
  } catch {}
};

export const printAttendee = async (t_z_id, postPrintURL) => {
  window.location =
    "../../10dance-v1.0.1-orientation-day/admin/print_page.html?id=" +
    t_z_id +
    `&post-print-url=${postPrintURL}`;
};
