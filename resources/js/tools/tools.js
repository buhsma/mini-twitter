export function formatDateTime(dateTimeString) {
  const date = new Date(dateTimeString);
  
  const options = {
      weekday: 'long', // Full name of the day of the week (e.g., "Monday")
      year: 'numeric', // Full numeric representation of the year (e.g., "2024")
      month: 'long', // Full name of the month (e.g., "March")
      day: 'numeric', // Numeric representation of the day of the month (e.g., "16")
      hour: 'numeric', // Numeric representation of the hour (e.g., "11" for 11 AM)
      minute: '2-digit', // 2-digit representation of the minute (e.g., "33")
      second: '2-digit', // 2-digit representation of the second (e.g., "59")
      hour12: false, // Use 24-hour format
      timeZone: 'CET', // Specify the time zone as UTC
  };

  return date.toLocaleString('en-DE', options);
}

export function formatDate(dateTimeString) {
  const date = new Date(dateTimeString);
  
  const options = {
      day: '2-digit', // 2-digit representation of the day (e.g., "16")
      month: '2-digit', // 2-digit representation of the month (e.g., "03" for March)
      year: 'numeric', // Full numeric representation of the year (e.g., "2024")
  };

  const formattedDate = date.toLocaleDateString('en-DE', options);
  return formattedDate.split('/').join('.'); // Replace slashes with dots
}

export function sortByNewest(tweets) {
  // Sort the tweets by date in descending order (newest first)
  return tweets.slice().sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
}

export function sortByOldest(tweets) {
  // Sort the tweets by date in ascending order (oldest first)
  return tweets.slice().sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
}

