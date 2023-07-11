<table align="center">
  <tr>
    <th>Entire assignment is repost from my other profile</th>
  </tr>
</table>

# WEBTE2 4. Assignment SS 2022/2023

This is an assignment for the WEBTE2 course for the academic year 2022/2023.

## General Instructions
- The tasks should be optimized for the latest versions of Google Chrome and Firefox.
- Assignments are always due at midnight on the day before the class.
- Late submission of assignments will result in a reduction of points.
- Create a new database for each assignment unless stated otherwise.
- Submit the assignment as a zip file, including the parent directory. Use the naming convention `idStudent_lastname_z4.zip`.
- The zip archive should contain the following files:
  - `index.php` (main script)
  - `config.php` (configuration file placed in the same directory as `index.php`)
  - `idStudent_lastname_z4.sql` (in case of working with a database)
  - `idStudent_lastname_z4.doc` (only for technical report)

When submitting the assignment through MS Teams, make sure to include the technical report and provide the URL of your page on the school server.

## Assignment Description
The assignment focuses on creating a web portal consisting of four sections:

1. In the first section, enter the address of your current location.
2. In the second section, display the weather forecast for the entered location. If the weather forecast is not available for the specified location, display the forecast for the nearest available location.
3. On the third page, display the following information:
   - GPS coordinates of the corresponding location
   - State to which the location belongs
   - Capital city of that state
4. The fourth section will display the following statistics:
   - Number of visitors to your portal, categorized by the states they come from. Present these data in a table that includes the flag of each state, the state name, and the number of visitors from that state. Consider a unique visit as one visit from one IP address within a day.
   - Clicking on a specific state will open a similar table displaying information about the number of visits from cities within that state.
   - Display a map with markers indicating the locations of your portal's visitors (you can use Google Maps, OpenStreet Maps, or any other alternative you prefer).
   - Information about the time at which visitors accessed your portal. Evaluate time periods between 6:00-15:00, 15:00-21:00, 21:00-24:00, and 24:00-6:00. Take into account the local time of each user (e.g., if a person from Bratislava visits the page at 19:00 and a person from New York also visits at 19:00 local time, despite the 6-hour time difference between the two cities, it should be considered the same local time).

Please note that you have the freedom to use any PHP technologies (such as CURL, various APIs, etc.) and any available information sources (e.g., Wikipedia). You can exchange API addresses through the discussion forum, Discord, or comments. For displaying flags, you can use URLs like: `http://www.geonames.org/flags/x/de.gif`, where the image name should correspond to the ISO code of the respective country, which is also used in email addresses.

Keep in mind the graphical appearance of the application.

## Conclusion
This assignment focuses on creating a web portal with multiple sections, including weather forecast display, visitor statistics, and map visualization. Follow the instructions provided and make sure to implement the required functionalities. Good luck with your assignment!
